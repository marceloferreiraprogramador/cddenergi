<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ativos;
use App\Sessions;
use App\Medidores;

class AtivosController extends Controller
{
    public function index($id)
    {
        Sessions::where('id', 1)->update(['codigo_perfil_sessions' =>$id]);
        $sessao = Sessions::findOrfail(1);
        $ativos = Ativos::all();
        $medidores = Medidores::all();

        return view('admin.ativo.index', compact('ativos','sessao','medidores'));
    }
    public function new()
    {
        $sessao = Sessions::findOrfail();

        return view('admin.ativo.store',compact('sessao'));
    }

    public function store(Request $request)
    {
        $addAtivos = $request->all();
        Sessions::where('id', 1)->update(['codigo_perfil_sessions' =>$addAtivos['id_perfil']]);
        Sessions::where('id', 1)->update(['num_ativo_sessions' =>$addAtivos['num_ativo']]);

        $ativos = new Ativos();
        $ativos->create($addAtivos);

        /* coloca acao na sessao */
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['acao_sessions' =>"novoAtivo"]);
        $acao = $sessao['acao_sessions'];
        /*fim*/
        return redirect()->route('agente.index');

    }

    public function edit(Ativos $ativos)
    {
        $sessao = Sessions::findOrfail(1);
        $medidores = Medidores::all();

        return view('admin.ativo.edit', compact('ativos','sessao','medidores'));
    }

    public function update(Request $request, $id)
    {
        $addAtivos = $request->all();
        $ativos = Ativos::findOrfail($id);
        $valorAntigo= $ativos['num_ativo'];

        Sessions::where('id', 1)->update(['codigo_perfil_sessions' =>$addAtivos['id_perfil']]);

        $sessao = Sessions::findOrfail(1);
        $ativos->update($addAtivos);
        $valorNovo = $ativos['num_ativo'];

        Medidores::where('num_ativo',$valorAntigo)->update(['num_ativo' =>$valorNovo]);
        Sessions::where('id', 1)->update(['num_ativo_sessions' =>$valorNovo]);



        /* coloca acao na sessao */
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['acao_sessions' =>"edicaoAtivo"]);
        $acao = $sessao['acao_sessions'];
        /* fim */


        return redirect()->route('agente.index');
    }
    public function delete($id)
    {
        /* coloca acao na sessao */
        Sessions::where('id', 1)->update(['acao_sessions' =>"deletarAtivo"]);
        /* fim */
        $ativos = Ativos::findOrfail($id);
        $ativos->delete();
        return redirect()->route('agente.index');

    }
}
