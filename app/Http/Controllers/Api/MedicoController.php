<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medico;
use App\Models\MedicoPaciente;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicoController extends Controller
{

    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $medicos = Medico::all();
            return response()->json(['message' => 'Medicos retornados com sucesso!', 'medicos' => $medicos]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!','error' => $e->getMessage()], 500);
        }
    }

    public function showDoctorsFromCity($id_cidade)
    {
        try {
          $medicos = Medico::where('cidades_id', '=', $id_cidade)->get();
          return response()->json(['message' => 'Medicos retornados com sucesso!', 'medicos' => $medicos]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!','error' => $e->getMessage()], 500);
        }
    }

    public function doctorPatient(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),[
                'medico_id' => 'required',
                'paciente_id' => 'required'
            ]);
            if ($validate->fails()) {
                return response()->json(['error' => $validate->errors()], 422);
            }

            $medico = Medico::where('id', '=', $request->medico_id)->get();
            $paciente = Paciente::where('id', '=', $request->paciente_id)->get();

            if ($medico == null || $paciente == null){
                return response()->json(['message' => 'medico ou paciente inexistente'],422);
            }

            $medico_paciente = new MedicoPaciente([
                'medico_id' => $request->medico_id,
                'paciente_id' => $request->paciente_id
            ]);

            $medico_paciente->save();

            return response()->json(['message' => 'Paciente alocado com sucesso', 'medico' => $medico, 'paciente' => $paciente], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!','error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(),[
                'nome' => 'required',
                'especialidade' => 'required',
                'cidade_id' => 'required'
            ]);
            if ($validate->fails()) {
                return response()->json(['error' => $validate->errors()], 422);
            }

            $medico = new Medico([
                'nome' => $request->nome,
                'especialidade' => $request->especialidade,
                'cidade_id' => $request->cidade_id,
            ]);

            $medico->save();
            return response()->json(['message' => 'Médico cadastrado com sucesso!', 'medico' => $medico]);
        }catch (\Exception $e){
            return response()->json(['message' => 'Erro por parte do servidor, tente novamente mais tarde!','error' => $e->getMessage()], 500);
        }
    }
}
