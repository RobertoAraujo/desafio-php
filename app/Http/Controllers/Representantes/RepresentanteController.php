<?php

namespace App\Http\Controllers\Representantes;

use App\Http\Controllers\Controller;
use App\Service\Representantes\RepresentanteService;
use Illuminate\Http\Request;

class RepresentanteController extends Controller
{
    protected $representanteService;

    public function __construct(RepresentanteService $representanteService)
    {
        $this->representanteService = $representanteService;
    }

    public function index()
    {
        $representantes = $this->representanteService->index();
        $estados = $this->representanteService->listaEstado() ?? [];
        $cidades = $this->representanteService->listaCidade() ?? [];
        return view('representantes.index', compact('representantes', 'cidades', 'estados'));
    }

    public function create()
    {
        $estados = $this->representanteService->listaEstado() ?? [];
        $cidades = $this->representanteService->listaCidade() ?? [];

        return view('representantes.create', compact('cidades', 'estados'));
    }

    public function store(Request $request)
    {
        $representante = $this->representanteService->store($request->all());
        if ($representante) {
            return redirect()->route('representante.index')->with('success', 'Representante cadastrado com sucesso');
        } else {
            return redirect()->route('representante.create')->with('error', 'Erro ao cadastrar representante');
        }
    }

    public function edit($id)
    {
        $representante = $this->representanteService->edit($id);

        $estados = $this->representanteService->listaEstado() ?? [];
        $cidades = $this->representanteService->listaCidade() ?? [];

        // dd($representante);
        return view('representantes.edit', compact('representante', 'cidades', 'estados'));
    }
    public function update(Request $request, $id)
    {
        $representante = $this->representanteService->update($request->all(), $id);
        if ($representante) {
            return redirect()->route('representante.index')->with('success', 'Representante atualizado com sucesso');
        } else {
            return redirect()->route('representante.edit', $id)->with('error', 'Erro ao atualizar representante');
        }
    }

    public function deletar($id)
    {
        $representante = $this->representanteService->deletar($id);
        if ($representante) {
            return redirect()->route('representante.index')->with('success', 'Representante deletado com sucesso');
        } else {
            return redirect()->route('representante.index')->with('error', 'Erro ao deletar representante');
        }
    }
}
