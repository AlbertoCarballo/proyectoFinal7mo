<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacientesController;

Route::get('/pacientes', [PacientesController::class, 'getPacientes']);
Route::get('/pacientes/{id}', [PacientesController::class, 'getSpecificPacientes']);
Route::post("/pacientes",[PacientesController::class, 'postPacientes']);
Route::put("/pacientes/{id}",[PacientesController::class, 'updatePacientes']);
Route::delete("/pacientes/{id}",[PacientesController::class, 'deletePaciente']);