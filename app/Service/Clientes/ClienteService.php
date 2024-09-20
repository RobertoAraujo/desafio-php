<?php

namespace App\Service\Clientes;

use App\Models\Cidades\Cidade;
use App\Models\Clientes\Cliente;
use App\Models\Endereco\Endereco;
use App\Models\Estados\Estado;
use Illuminate\Support\Facades\DB;

class ClienteService
{

    protected $cliente;
    protected $endereco;
    protected $cidade;
    protected $estado;

    public function __construct(Cliente $cliente, Endereco $endereco, Cidade $cidade, Estado $estado)
    {
        $this->cliente = $cliente;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    public function index()
    {
        $cliente = $this->cliente::with('endereco')->orderBy('id', 'DESC')->paginate(10);
        return $cliente;
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
        return view('clientes.create');
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $cliente = $this->cliente::create([
                'nome' => $data['nome'],
                'cpf' => $data['cpf'],
                'data_nascimento' => $data['datanascimento'],
                'genero' => $data['genero'],
            ]);

            if ($cliente) {
                $this->endereco->create([
                    'endereco' => $data['endereco'],
                    'cidade' => $data['cidade'],
                    'estado' => $data['estado'],
                    'cliente_id' => $cliente->id,
                ]);
            } else {
                throw new \Exception('Falha ao criar o cliente.');
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
        $cliente = $this->cliente::with('endereco')->find($id);
        return $cliente;
    }

    public function update($data, $id)
    {
        DB::beginTransaction();
        try {
            // Atualiza o cliente
            $cliente = $this->cliente::find($id);
            $cliente->update([
                'nome' => $data['nome'],
                'cpf' => $data['cpf'],
                'data_nascimento' => $data['datanascimento'],
                'genero' => $data['genero'],
            ]);

            if ($cliente) {
                $endereco = $this->endereco::where('cliente_id', $id)->first();
                $endereco->update([
                    'endereco' => $data['endereco'],
                    'cidade' => $data['cidade'],
                    'estado' => $data['estado'],
                ]);
            } else {
                throw new \Exception('Falha ao atualizar o cliente.');
            }

            DB::commit();
            return true;
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return false;
        }
    }

    public function deletar($id)
    {
        DB::beginTransaction();

        try {
            $cliente = Cliente::find($id);
            if (!$cliente) {
                throw new \Exception('Cliente não encontrado.');
            }

            $cliente->delete();

            $endereco = Endereco::where('cliente_id', $id)->first();
            if ($endereco) {
                $endereco->delete();
            }
 
            DB::commit();
            return redirect()->route('cliente.index')->with('success', 'Cliente deletado com sucesso.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cliente.index')->with('error', 'Erro ao deletar cliente: ' . $e->getMessage());
        }
    }
}
