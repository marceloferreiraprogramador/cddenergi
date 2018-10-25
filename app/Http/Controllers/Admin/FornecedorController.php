<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fornecedores;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedores::all();
        return view('admin.fornecedor.index', compact('fornecedores'));
    }

    public function new()
    {
        return view('admin.fornecedor.store');
    }

    public function store(Request $request)
    {
        $addfornecedores = $request->all();

        $fornecedores = new Fornecedores();
        $fornecedores->create($addfornecedores);

        return redirect()->route('fornecedor.index');

    }

    public function edit(Fornecedores $fornecedores)
    {
        return view('admin.fornecedor.edit', compact('fornecedores'));
    }

    public function update(Request $request, $id)
    {
        $addfornecedores = $request->all();

        $fornecedores = Fornecedores::findOrfail($id);
        $fornecedores->update($addfornecedores);

        return redirect()->route('fornecedor.index');
    }
    public function delete($id)
    {
        $fornecedores = Fornecedores::findOrfail($id);
        $fornecedores->delete();
        return redirect()->route('fornecedor.index');

    }
}
