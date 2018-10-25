<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medidores;
use App\Sessions;

class MedidoresController extends Controller
{
    public function index($id)
    {
        Sessions::where('id', 1)->update(['num_ativo_sessions' =>$id]);

        $sessao = Sessions::findOrfail(1);

        return view('admin.medidor.index',compact('sessao'));

    }

    public function new()
    {
        $sessao = Sessions::findOrfail(1);
        return view('admin.medidor.store',compact('sessao'));
    }

    public function store(Request $request)
    {
        $addmedidor = $request->all();

        $medidores = new Medidores();
        $medidores->create($addmedidor);
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['num_ativo_sessions' =>$addmedidor['num_ativo']]);

        /* coloca acao na sessao */
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['acao_sessions' =>"novoAtivo"]);
        $acao = $sessao['acao_sessions'];
        /*fim*/
        return redirect()->route('agente.index');

    }

    public function edit(Medidores $medidores)
    {

        return view('admin.medidor.edit', compact('medidores'));
    }

    public function update(Request $request, $id)
    {
        $addmedidor = $request->all();
        $medidores = Medidores::findOrfail($id);
        $medidores->update($addmedidor);

        /* coloca a acao como edicao do agente  */
        $sessao = Sessions::findOrfail(1);
        Sessions::where('id', 1)->update(['acao_sessions' =>"edicaoMedidor"]);
        $acao = $sessao['acao_sessions'];
        /* fim */
        return redirect()->route('agente.index');
    }
    public function delete($id)
    {

        $medidores = Medidores::findOrfail($id);
        $medidores->delete();
        return redirect()->route('agente.index');

    }
}
