<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Models\Endereco;
use App\Http\Controllers\EnderecoController;

class UserController extends Controller
{
    public function index()
    {
        $user = User::with('address')->paginate(10);
        return response()->json($user, 200);
    }

    public function create(){
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        return $user;
    }

    public function show($id){
        $user = User::with('address')->findOrFail($id);
        return view('users.view', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($request->id);
        if ($user == null) {
            return response()->json(null, 404);
        }
        $user->update($request->all());
        return $user;
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(null, 204);
    }

    public function completeStore(Request $request){

        $endereco = Endereco::create($request->all());

        $newRequestData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => false,
            'cpf' => $request->cpf,
            'address_id' => $endereco->id,
            'phone' => $request->phone
        ];
        
        $newRequest = new UserRequest($newRequestData);

        $user = $this->store($newRequest);
        $endereco->update(['user_id' => $user->id]);

        $user = User::with('address')->find($user->id);

        return redirect()->route('home')->with('success', 'Usuário criado com sucesso!');
    }

    public function atualizar($id) {
        $user = User::with('address')->findOrFail($id); 
        return view('users.update', compact('user'));
    }

    public function completeUpdate(Request $request, $id){
        $user = $this->update($request, $id);
        $endereco = EnderecoController::update($request,$user->address_id);
        $user = User::with('address')->find($id);
        return redirect()->route('home')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function login(){
        return view('users.login');
    }
}
