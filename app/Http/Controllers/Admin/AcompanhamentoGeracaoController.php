<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clientes;
use App\Ativos;


class AcompanhamentoGeracaoController extends Controller
{
    public function index()
    {
        $clientes = Clientes::all();
        $ativos = Ativos::all();

        return view('admin.acompanhamentoGeracao.index', compact('clientes', 'ativos'));
    }
    public function index2($id)
    {
        echo($id);exit();

        return view('admin.acompanhamentoGeracao.index', compact('clientes', 'ativos'));
    }
    public function new()
    {
        return view('admin.acompanhamentoGeracao.store');
    }

    public function store(Request $request)
    {

        return redirect()->route('agente.index');

    }
}
