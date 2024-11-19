<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animais = Animal::paginate(10);
        return view('animals.index',compact('animais'));
    }

    public function store(Request $request)
    {
                // Se houver uma foto, faça o upload
        if ($request->hasFile('foto')) {
            // Armazena a foto no diretório 'public/fotos' e retorna o caminho relativo
            $fotoPath = $request->file('foto')->store('fotos', 'public');
        } else {
            // Caso não haja foto, define uma foto padrão
            $fotoPath = null; // ou uma foto padrão, como: 'fotos/default.png'
        }

        // Criação do animal
        $animal = new Animal();
        $animal->nome = $request->input('nome');
        $animal->especie = $request->input('especie');
        $animal->raca = $request->input('raca');
        $animal->idade = $request->input('idade');
        $animal->sexo = $request->input('sexo');
        $animal->temperamento = $request->input('temperamento');
        $animal->foto = $fotoPath; // Salva o caminho da foto no banco
        $animal->status = 'Disponível'; // Define o status como "Disponível"
        
        // Salva o animal no banco
        $animal->save();
        
        return redirect()->route('animals.create')->with('success', 'Animal criado com sucesso!');
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        
        return view('animals.view',compact('animal'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::find($request->id);
        if ($animal == null) {
            return response()->json(null, 404);
        }
        $animal->update($request->all());
        return redirect()->route('animals.index')->with('success', 'Animal atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $animal = Animal::find($id);
        if ($animal == null) {
            return response()->json(null, 404);
        }
        $animal->delete();
        return redirect()->route('animals.index')->with('success', 'Animal atualizado com sucesso!');
    }

    public function create()
    {
        return view('animals.create');
    }

    public function atualizar($id) {    
        $animal = Animal::find($id); 
        return view('animals.update', compact('animal'));
    }

    public function carrossel()
{
    // Buscar 4 imagens aleatórias da tabela de animais
    $imagens = Animal::inRandomOrder()->limit(4)->get();

    return view('index', compact('imagens'));
}


}
