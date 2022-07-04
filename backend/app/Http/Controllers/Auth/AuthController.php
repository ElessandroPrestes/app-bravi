<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            'password' => 'required|string|min:6'
        ]);

        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

       
            $accessToken = $user->createToken($request->auth_api);
            return response()->json([
                'user' => $user, 'access_token' => $accessToken->plainTextToken,  'message' => 'Cadastro Efetuado!'
            ], 201);
     

        return response()->json([
            'error' => 'Erro ao cadastrar usuário'
        ], 422);
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

       
        $user = User::where('email', $login['email'])->first();

        if(!$user || !Hash::check($login['password'], $user->password))
        {
            return response()->json(['message' => 'Email ou Senha Inválidos'], 401);
        }

        $accessToken = $user->createToken('auth-api')->accessToken;
        return response()->json([
            'user' => $user, 'access_token' => $accessToken,  'message' => 'Usuário Logado!'
        ], 201);
    }
}
