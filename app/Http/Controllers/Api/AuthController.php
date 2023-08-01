<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciais não encontradas!'], 401);
            }

            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            return response()->json(['message' => 'Login realizado com sucesso', 'token' => $token]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!','error' => $e->getMessage()], 500);
        }
    }

    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $request->user()->token()->revoke();
            return response()->json(['message' => 'Saiu da conta com sucesso!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!','error' => $e->getMessage()], 500);
        }
    }
    public function refresh(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $token = $request->user()->refreshToken;
            return response()->json(['token' => $token]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!', 'error' => $e->getMessage()], 500);
        }
    }

}
