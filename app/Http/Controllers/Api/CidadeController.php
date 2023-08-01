<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cidades;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $cidades = Cidades::all();
            return response()->json(['message' => 'Cidades retornadas com sucesso!', 'cidades' => $cidades]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!','error' => $e->getMessage()], 500);
        }
    }
}
