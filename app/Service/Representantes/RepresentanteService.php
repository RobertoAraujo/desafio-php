<?php
namespace App\Service\Representantes;
use App\Models\Cidades\Cidade;
use App\Models\Clientes\Cliente;
use App\Models\Endereco\Endereco;
use App\Models\Estados\Estado;
use App\Models\Representantes\Representante;
use Illuminate\Support\Facades\DB;

class RepresentanteService
{
    protected $representante;
    protected $endereco;
    protected $cidade;
    protected $estado;

    protected $cliente;

    public function __construct(Representante $representante, Endereco $endereco, Cidade $cidade, Estado $estado, Cliente $cliente)
    {
        $this->representante = $representante;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cliente = $cliente;
    }

    public function index()
    {
        $representantes = $this->representante::with('endereco')->orderBy('id', 'DESC')->paginate(10);
        $clientes = $this->cliente::whereHas('endereco', function ($query) use ($representantes) {
            $query->whereIn('cidade', $representantes->pluck('endereco.cidade'))
              ->whereIn('estado', $representantes->pluck('endereco.estado'));
        })->orderBy('id', 'DESC')->paginate(10);

        return $clientes;
    }

    public function listaEstado()
    {
        return $this->estado::all();
    }

    public function listaCidade()
    {
        return $this->cidade::all();
    }

    public function create()
    {
        return view('representantes.create');
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $representante = $this->representante::create([
                'nome' => $data['nome'],
                'cpf' => $data['cpf'],
                'data_nascimento' => $data['datanascimento'],
                'genero' => $data['genero'],
            ]);

            if ($representante) {
                $this->endereco->create([
                    'endereco' => $data['endereco'],
                    'cidade' => $data['cidade'],
                    'estado' => $data['estado'],
                    'representante_id' => $representante->id,
                ]);
            } else {
                throw new \Exception('Falha ao criar o representante.');
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function edit($id)
    {
        $representante = $this->representante::with('endereco')->find($id);
        return $representante;
    }
    public function update($id, $data)
    {
        DB::beginTransaction();
        try {
            // Atualiza o representante
            $representante = $this->representante::find($id);
            $representante->update([
                'nome' => $data['nome'],
                'cpf' => $data['cpf'],
                'data_nascimento' => $data['datanascimento'],
                'genero' => $data['genero'],
            ]);

            // Atualiza o endereço
            $endereco = $this->endereco::where('representante_id', $id)->first();
            $endereco->update([
                'cep' => $data['cep'],
                'logradouro' => $data['logradouro'],
                'numero' => $data['numero'],
                'complemento' => $data['complemento'],
                'bairro' => $data['bairro'],
                'cidade_id' => $data['cidade_id'],
                'estado_id' => $data['estado_id'],
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
    public function deletar($id)
    {
        DB::beginTransaction();
        try {
            $representante = $this->representante::find($id);
            $endereco = $this->endereco::where('representante_id', $id)->first();
            $endereco->delete();
            $representante->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}