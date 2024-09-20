<?php
namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Service\Clientes\ClienteService;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function index()
    {
        $clientes = $this->clienteService->index();
        $estados = $this->clienteService->listaEstado() ?? [];
        $cidades = $this->clienteService->listaCidade() ?? [];
        return view('clientes.index', compact('clientes', 'cidades', 'estados'));
    }

    public function create()
    { 
        $estados = $this->clienteService->listaEstado() ?? [];
        $cidades = $this->clienteService->listaCidade() ?? [];

        return view('clientes.create', compact('cidades', 'estados'));
    }

    public function store(Request $request)
    {
        $cliente = $this->clienteService->store($request->all());
        if ($cliente) {
            return redirect()->route('cliente.index')->with('success', 'Cliente cadastrado com sucesso');
        } else {
            return redirect()->route('cliente.create')->with('error', 'Erro ao cadastrar cliente');
        }
    }

    public function edit($id)
{
    $cliente = $this->clienteService->edit($id);
    
    $estados = $this->clienteService->listaEstado() ?? [];
    $cidades = $this->clienteService->listaCidade() ?? [];

    // dd($cliente);
    return view('clientes.edit', compact('cliente', 'cidades', 'estados'));
}


    public function deletar($id)
    {
        $cliente = $this->clienteService->deletar($id);
        if ($cliente) {
            return redirect()->route('cliente.index')->with('success', 'Cliente deletado com sucesso');
        } else {
            return redirect()->route('cliente.index')->with('error', 'Erro ao deletar cliente');
        }
    }
}