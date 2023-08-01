<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'index']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::get('/cidades', [\App\Http\Controllers\Api\CidadeController::class, 'index']);
Route::get('/medicos', [\App\Http\Controllers\Api\MedicoController::class, 'index']);
Route::get('/cidades/{id_cidade}/medicos', [\App\Http\Controllers\Api\MedicoController::class, 'showDoctorsFromCity']);

Route::middleware(['api'])->group(function () {
    Route::post('/medicos/{id_medico}/pacientes', [\App\Http\Controllers\Api\MedicoController::class, 'doctorPatient']);
    Route::post('/medicos', [\App\Http\Controllers\Api\MedicoController::class, 'store']);
    Route::get('/medicos/{id_medico}/pacientes', [\App\Http\Controllers\Api\PacienteController::class, 'getPatientFromDoctor']);
});
