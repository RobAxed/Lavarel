<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->orderBy('created_at', 'desc')->get();
        $categorias = Categoria::orderBy('nome')->get();
        return view('produtos.index', compact('produtos', 'categorias'));
    }

    public function create()
    {
        return $this->index();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'nullable|exists:categorias,id'
        ]);

        Produto::create($data);

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso.');
    }
}
