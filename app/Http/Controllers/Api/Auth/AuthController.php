<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function auth(Request $request){

        $user = User::where('email',$request->email)->first();

        
        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages(
                [
                    'email' => ['As credenciais estao incorretas']
                ]
                );
            
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
            'user_id' => $user->id
        ]);
    }


    public function logout(Request $request){

        $user = User::where('email',$request->email)->first();
        dd($user);
        $user->tokens()->delete();
        return response()->json(null, 204);
    }
    
}
