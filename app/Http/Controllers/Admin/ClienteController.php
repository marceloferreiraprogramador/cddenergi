<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clientes;
use App\Sessions;
use App\Perfils;
use App\Agentes;
class ClienteController extends Controller
{

    public function index()
    {
        $sessao = Sessions::findOrfail(1);
        $acao = $sessao['acao_sessions'];
        $clientes = Clientes::all();

        return view('admin.cliente.index', compact('clientes','acao'));
    }

    public function new()
    {
        return view('admin.cliente.store');
    }

    public function store(Request $request)
    {
        $addCliente = $request->all();
        Sessions::where('id', 1)->update(['cnpj_sessions' =>$addCliente['cnpj']]);
        $clientes = new Clientes();
        $clientes->create($addCliente);

        /* coloca a acao na sessao  */
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['acao_sessions' =>"cadastro"]);
        $acao = $sessao['acao_sessions'];
        /* fim */
        $clientes = Clientes::where('cnpj', $sessao['cnpj_sessions'])->firstOrFail();
        return view('admin.cliente.edit',compact('clientes','addCliente','acao'));
    }


    public function edit(Clientes $clientes)
    {
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['cnpj_sessions' =>$clientes['cnpj']]);
        $acao = "nada";
        Sessions::where('id', 1)->update(['acao_sessions' =>$acao]);

        /* coloca a acao na sessao  */
        return view('admin.cliente.edit', compact('clientes','sessao','acao'));
    }

    public function update(Request $request, $id)
    {
        $addCliente = $request->all();
        $clientes = Clientes::findOrfail($id);
        $sessao = Sessions::findOrfail(1);
        $clientes->update($addCliente);
        $valorAntigo= $sessao['cnpj_sessions'];
        $valorAntigo = $valorAntigo *1;
        $valorNovo = $clientes['cnpj']*1;
        Perfils::where('cnpj',$valorAntigo)->update(['cnpj' =>$valorNovo]);
        Agentes::where('cnpj',$valorAntigo)->update(['cnpj' =>$valorNovo]);

        /* coloca a acao na sessao  */
        Sessions::where('id', 1)->update(['cnpj_sessions' =>$addCliente['cnpj']]);
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['acao_sessions' =>"edicaoPerfil"]);
        $acao = $sessao['acao_sessions'];
        /* coloca a acao na sessao  */

        return redirect()->route('cliente.index');
    }
    public function delete($id)
    {
        /* coloca acao na sessao */
        Sessions::where('id', 1)->update(['acao_sessions' =>"deletarCliente"]);
        /* fim */
        $clientes = Clientes::findOrfail($id);
        $clientes->delete();
        return redirect()->route('cliente.index');
    }
}
