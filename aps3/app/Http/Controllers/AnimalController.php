<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('especie')) {
            $especie = $request->especie;
            cookie()->queue('ultima_especie', $especie, 60 * 24 * 30);
        } else {
            $especie = $request->cookie('ultima_especie');
        }

        $animais = Animal::query()
            ->when($especie, function ($query) use ($especie) {
                return $query->where('especie_id', $especie);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('animais.index', compact('animais', 'especie'));
    }

    public function create(Request $request)
    {
        $ultimaEspecie = $request->cookie('ultima_especie');
        return view('animais.create', compact('ultimaEspecie'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:2',
            'idade' => 'required|integer|min:0',
            'especie_id' => 'required|exists:especies,id',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $caminhoFoto = null;

        if ($request->hasFile('foto')) {
            $caminhoFoto = $request->file('foto')->store('animais', 'public');
        }

        Animal::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'especie_id' => $request->especie_id,
            'foto' => $caminhoFoto
        ]);

        return redirect()->route('animais.index')->with('sucesso', 'Animal cadastrado!');
    }

    public function show(Animal $animal)
    {
        return view('animais.show', compact('animal'));
    }

    public function edit(Animal $animal)
    {
        return view('animais.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nome' => 'required|min:2',
            'idade' => 'required|integer|min:0',
            'especie_id' => 'required|exists:especies,id',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $animal->foto = $request->file('foto')->store('animais', 'public');
        }

        $animal->nome = $request->nome;
        $animal->idade = $request->idade;
        $animal->especie_id = $request->especie_id;
        $animal->save();

        return redirect()->route('animais.index')->with('sucesso', 'Atualizado com sucesso!');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animais.index')->with('sucesso', 'Animal removido!');
    }
}
