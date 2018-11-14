<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perfils;
use App\Sessions;
use App\Ativos;

class PerfilController extends Controller
{
    public function index()
    {
        $perfils = Perfils::all();
        return view('admin.perfil.index', compact('perfils'));
    }

    public function new()
    {
        $sessao = Sessions::findOrfail(1);

        return view('admin.perfil.store',compact('sessao'));
    }

    public function store(Request $request)
    {
        $addPerfils = $request->all();
        $perfils = new Perfils();
        $perfils->create($addPerfils);
        Sessions::where('id', 1)->update(['codigo_perfil_sessions' =>$addPerfils['codigo_perfil']]);

        /* coloca acao na sessao */
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['acao_sessions' =>"novoPerfil"]);
        $acao = $sessao['acao_sessions'];
        /* fim */
        return redirect()->route('agente.index',compact('acao'));

    }

    public function edit(Perfils $perfils)
    {

        return view('admin.perfil.edit', compact('perfils'));
    }

    public function update(Request $request, $id)
    {
        $addPerfils = $request->all();
        $perfils = Perfils::findOrfail($id);
        Sessions::where('id', 1)->update(['codigo_perfil_sessions' =>$perfils['codigo_perfil']]);

        $sessao = Sessions::findOrfail(1);
        $perfils->update($addPerfils);

        $valorAntigo= $sessao['codigo_perfil_sessions'];

        $valorAntigo = $valorAntigo *1;
        $valorNovo = $addPerfils['codigo_perfil']*1;
        Ativos::where('id_perfil',$valorAntigo)->update(['id_perfil' =>$valorNovo]);

        Sessions::where('id', 1)->update(['codigo_perfil_sessions' =>$valorNovo]);
        return redirect()->route('agente.index');
    }
    public function delete($id)
    {
        /* coloca acao na sessao */
        Sessions::where('id', 1)->update(['acao_sessions' =>"deletarPerfil"]);
        /* fim */
        $perfils = Perfils::findOrfail($id);
        $perfils->delete();
        return redirect()->route('agente.index');

    }
}
