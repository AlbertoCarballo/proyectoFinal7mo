<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacientesController;
use App\Http\Controllers\Api\DoctoresController;
use App\Http\Controllers\Api\EspecialidadesController;
use App\Http\Controllers\Api\authController;
use App\Http\Controllers\Api\citasController;

//Ruta Auth
Route::post("/auth",[authController::class, 'login']);

//Rutas para Pacientes

Route::get('/ver-pacientes', [PacientesController::class, 'getPacientes']);
Route::get('/ver-un-paciente/{id}', [PacientesController::class, 'getSpecificPacientes']);
Route::post("/crear-pacientes",[PacientesController::class, 'postPacientes']);
Route::put("/actualizar-pacientes/{id}",[PacientesController::class, 'updatePacientes']);
Route::delete("/borrar-pacientes/{id}",[PacientesController::class, 'deletePaciente']);


//Rutas para Doctores
Route::get('/ver-mi-doctor/{correo}', [DoctoresController::class, 'getDoctorByCorreo']);
Route::get('/ver-doctores', [DoctoresController::class, 'getDoctores']);
Route::get('/ver-un-doctor/{id}', [DoctoresController::class, 'getSpecificDoctor']);
Route::post("/crear-doctores",[DoctoresController::class, 'postDoctor']);
Route::put("/actualizar-doctor/{id}",[DoctoresController::class, 'updateDoctor']);
Route::delete("/borrar-doctores/{id}",[DoctoresController::class, 'deleteDoctor']);


//Ruta especialidad
Route::get('/especialidades', [EspecialidadesController::class, 'getEspecialidades']);

//Rutas para citas
Route::get('/ver-citas', [citasController::class, 'getCitas']);
Route::get('/ver-mis-citas/{id}', [citasController::class, 'getMisCitas']);
Route::get('/ver-una-cita/{id}', [citasController::class, 'getSpecificCita']);
Route::post("/crear-cita",[citasController::class, 'postCitas']);
Route::put("/actualizar-cita/{id}",[citasController::class, 'updateCita']);
Route::delete("/borrar-cita/{id}",[citasController::class, 'deleteCita']);