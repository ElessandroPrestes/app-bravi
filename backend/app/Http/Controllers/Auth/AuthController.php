<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6'
        ]);

        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
       
        $token = $user->createToken($request->nameToken)->plainTextToken;
        
            return response()->json([
                'user' => $user, 'nameToken' =>$token,  'message' => 'Cadastro Efetuado!'
        ], 201);
     

        return response()->json([
            'error' => 'Erro ao cadastrar usuário'
        ], 422);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

       
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json(['message' => 'Email ou Senha Inválidos'], 401);
        }

       $token = $user->createToken('UsuarioLogado')->plainTextToken;
    
        return response()->json([
            'user' => $user, 'nameToken' =>$token,  'message' => 'Usuário Logado!'
        ], 201);
    }

    public function logout(User $user)
    {

       $user->tokens()->delete();

        return response([
            'message' => 'Deslogado com Sucesso!.'
        ],200);
    }
}

