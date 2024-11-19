<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\Animal;

class SolicitacaoController extends Controller
{

    public function index(Request $request)
{
    $query = Solicitacao::with(['user', 'animal']); // Começa a consulta com os relacionamentos

    if ($request->has('situacao') && in_array($request->situacao, ['Em analise', 'Aprovada', 'Rejeitada'])) {
        $query->where('situacao', $request->situacao);
    }

    // Paginando os resultados
    $solicitacoes = $query->paginate(10);

    return view('solicitacoes.index', compact('solicitacoes'));
}
 

    public function store(Request $request)
    {
        $solicitacao = Solicitacao::create($request->all());
        $solicitacao->situacao = "Em analise";
        $solicitacao->save();
        
        return redirect()->route('animals.index')->with('success', 'Solicitação de adoção enviada com sucesso!');
    }

    public function show($id)
    {
        $solicitacao = Solicitacao::find($id);
        return response()->json($solicitacao, 200);
    }

    public function update(Request $request, $id)
    {
        $solicitacao = Solicitacao::find($request->id);
        if ($solicitacao == null) {
            return response()->json(null, 404);
        }
        $solicitacao->update($request->all());
        return $solicitacao;
    }

    public function destroy($id)
    {
        $solicitacao = Solicitacao::find($id);
        $solicitacao->delete();
        return response()->json(null, 204);
    }

    public function aceitarSolicitacao($id){
        $solicitacao = Solicitacao::findOrFail($id);
        $animal = Animal::find($solicitacao->animal_id);
        if($animal != null){
            $animal->status = "Adotado";
            $animal->save();
            $solicitacao->situacao = "Aprovada";
            $solicitacao->save();
        }else{
            return redirect()->route('solicitacoes.index')->with(['message'=>'Animal não encontrado']);
        }
        return redirect()->route('solicitacoes.index')->with(['message'=>'Solicitação aceita com sucesso']);
    }

    public function recusarSolicitacao($id){
        $solicitacao = Solicitacao::findOrFail($id);
        $animal = Animal::find($solicitacao->animal_id);
        if($animal != null){
            if($animal->status != "Disponivel"){
                $animal->status = "Disponível";
                $animal->save();
            }
            $solicitacao->situacao = "Recusada";
            $solicitacao->save();
        }else{
            return redirect()->route('solicitacoes.index')->with(['message'=>'Animal não encontrado']);
        }
        return redirect()->route('solicitacoes.index')->with(['message'=>'Solicitação Recusada com sucesso']);
    }
}
