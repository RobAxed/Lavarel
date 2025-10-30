<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::orderBy('created_at', 'desc')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return $this->index();
    }

public function store(Request $request)
{
    $data = $request->validate([
        'nome' => 'required|string|max:255',
        // se quiser aceitar descricao em categorias, descomente e adicione coluna na migration
        // 'descricao' => 'nullable|string|max:1000',
    ]);

    Categoria::create($data);

    return redirect()->route('categorias.index')->with('success', 'Categoria cadastrada com sucesso.');
}

}
