<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacientesController;
use App\Http\Controllers\Api\DoctoresController;
use App\Http\Controllers\Api\EspecialidadesController;
use App\Http\Controllers\Api\authController;

//Ruta Auth
Route::post("/auth",[authController::class, 'login']);

//Rutas para Pacientes

Route::get('/pacientes', [PacientesController::class, 'getPacientes']);
Route::get('/pacientes/{id}', [PacientesController::class, 'getSpecificPacientes']);
Route::post("/pacientes",[PacientesController::class, 'postPacientes']);
Route::put("/pacientes/{id}",[PacientesController::class, 'updatePacientes']);
Route::delete("/pacientes/{id}",[PacientesController::class, 'deletePaciente']);


//Rutas para Doctores
Route::get('doctores/{correo}', [DoctoresController::class, 'getDoctorByCorreo']);
Route::get('/doctores', [DoctoresController::class, 'getDoctores']);
Route::get('/doctores/{id}', [DoctoresController::class, 'getSpecificDoctor']);
Route::post("/doctores",[DoctoresController::class, 'postDoctor']);
Route::put("/doctores/{id}",[DoctoresController::class, 'updateDoctor']);
Route::delete("/doctores/{id}",[DoctoresController::class, 'deleteDoctor']);


//Ruta especialidad
Route::get('/especialidades', [EspecialidadesController::class, 'getEspecialidades']);