<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
{
    public function getPatientFromDoctor($id_medico)
    {
        try {
            $medico = Medico::findOrFail($id_medico);

            return response()->json(['message' => 'Estão são os pacientes deste médico', 'medico' => $medico->paciente]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),[
                'nome' => 'required',
                'cpf' => 'required',
                'celular' => 'required'
            ]);
            if ($validate->fails()) {
                return response()->json(['error' => $validate->errors()], 422);
            }

            $paciente = new Paciente([
                'nome' => $request->nome,
                'cpf' => $request->cpf,
                'celular' => $request->celular,
            ]);

            $paciente->save();
            return response()->json(['message' => 'Paciente cadastrado com sucesso!', 'paciente' => $paciente]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id_paciente)
    {
        try {
            $paciente = Paciente::findOrFail($id_paciente);

            if ($paciente == null) {
                return response()->json(["message" => "Paciente não encontrado"], 404);
            }

            $paciente->nome = $request->nome == null ? $paciente->nome : $request->nome;
            $paciente->cpf = $request->cpf == null ? $paciente->cpf : $request->cpf;
            $paciente->celular = $request->celular == null ? $paciente->celular : $request->celular;

            $paciente->save();

            return response()->json(['message' => 'Paciente atualizado com sucesso!', 'paciente' => $paciente]);
        }catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!', 'error' => $e->getMessage()], 500);
        }
    }
}
