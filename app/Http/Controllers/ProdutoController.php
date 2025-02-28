<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = Produto::with('unidade')->orderBy('created_at', 'desc')->paginate(10);
        return view('lista.index', ["produtos" => $produtos]);
    }

    public function detalhes(Produto $produto) {
        //$produto = Produto::with('unidade')->findOrFail($id); //Sem Route Model Binding
        $produto->load('unidade');
        return view('lista.detalhes', ["produto" => $produto]);
    }

    public function adicionarProduto() {
        $unidades = Unidade::all();
        return view('lista.adicionar', ["unidades" => $unidades]);
    }

    public function guardarDados(Request $request) {
        $validado = $request->validate([
            'nome' => 'required|string|regex:/^[\pL\s\-]+$/u|max:255',
            'preco' => 'required|numeric|decimal:2|gte:0',
            'unidade_id' => 'required|exists:unidades,id',
        ]);
        Produto::create($validado);

        return redirect()->route('lista.index')->with('sucesso', 'Produto adicionado com sucesso!');
    }

    public function deletarDado(Produto $produto){
        //$produto = Produto::findOrFail($id); //Sem Route Model Binding 
        $produto->delete(); //Com Route Model Binding

        return redirect()->route('lista.index')->with('sucesso', 'Produto apagado com sucesso!');
    }
}
