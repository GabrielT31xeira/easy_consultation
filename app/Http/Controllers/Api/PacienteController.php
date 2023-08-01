<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medico;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function getPatientFromDoctor($id_medico)
    {
        try {
            $medico_paciente = Medico::where('id', '=', $id_medico);
            dd($medico_paciente);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!', 'error' => $e->getMessage()], 500);
        }
    }
}
