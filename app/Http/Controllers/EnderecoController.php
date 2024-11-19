<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index(){
        $endereco = Endereco::paginate(10);
        return response()->json($endereco, 200, $headers);
    }

    public function store(EnderecoRequest $request){
        $endereco = Endereco::create($request->all());
        return $endereco;
    }

    public function show($id){
        $endereco = Endereco::find($id);
        return response()->json($endereco, 200, $headers);
    }

    public static function update(Request $request, $id){
        $endereco = Endereco::find($id);
        if($endereco->user_id == null){
            $endereco->user_id = $request->id;
        }
        $endereco->update($request->all());
        return response()->json($endereco, 200);
    }

    public function destroy($id){
        $endereco = Endereco::find($id);
        $endereco->delete();
        return response()->json(null, 204, $headers);
    }
}
