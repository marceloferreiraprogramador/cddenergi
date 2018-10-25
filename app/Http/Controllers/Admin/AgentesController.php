<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agentes;
use App\Perfils;
use App\Ativos;
use App\Clientes;
use App\Sessions;
use App\Medidores;

class AgentesController extends Controller
{
    public function index()
    {
        $sessao = Sessions::findOrfail(1);
        $agentes = Agentes::all();
        $perfils = Perfils::all();
        $ativos = Ativos::all();
        $medidores = Medidores::all();

        $clientes = Clientes::where('cnpj', $sessao['cnpj_sessions'])->firstOrFail();
        /* passa a acao para a tela principal do cliente/agentes  */
        $sessao = Sessions::findOrfail(1);
        $acao = $sessao['acao_sessions'];
        /* fim */
        return view('admin.agente.index', compact('agentes','perfils','ativos','clientes','sessao','acao','medidores'));
    }

    public function new()
    {
        return view('admin.agente.store');
    }

    public function store(Request $request)
    {
        $addAgente = $request->all();

        $agentes = new Agentes();
        $agentes->create($addAgente);

        /* coloca a acao como novo agente  */
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['acao_sessions' =>"novoAgente"]);
        $acao = $sessao['acao_sessions'];
        /* fim */
        return redirect()->route('agente.index');

    }

    public function edit(Agentes $agentes)
    {
        return view('admin.agente.edit', compact('agentes'));
    }

    public function update(Request $request, $id)
    {
        $addAgente = $request->all();
        $agentes = Agentes::findOrfail($id);
        $agentes->update($addAgente);

        /* coloca a acao como edicao do agente  */
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['acao_sessions' =>"edicaoAgente"]);
        $acao = $sessao['acao_sessions'];
        /* fim */
        return redirect()->route('agente.index');
    }
    public function delete($id)
    {
        /* coloca a acao na sessao */
        Sessions::where('id', 1)->update(['acao_sessions' =>"deletarAgente"]);
        /* fim */

        $agentes = Agentes::findOrfail($id);
        $agentes->delete();
        return redirect()->route('agente.index');

    }
}
