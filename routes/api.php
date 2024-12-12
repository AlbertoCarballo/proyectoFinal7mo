<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacientesController;
use App\Http\Controllers\Api\DoctoresController;
use App\Http\Controllers\Api\EspecialidadesController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\citasController;
use App\Http\Controllers\Api\ResumenController;

//Ruta Auth
Route::post("/auth",[AuthController::class, 'login']);
Route::post("/auth-movil",[authController::class, 'loginMovil']);

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
Route::get('/ver-mis-citas-paciente/{id}', [citasController::class, 'getMisCitasPaciente']);
Route::get('/ver-una-cita/{id}', [citasController::class, 'getSpecificCita']);
Route::post("/crear-cita",[citasController::class, 'postCitas']);
Route::put("/actualizar-cita/{id}",[citasController::class, 'updateCita']);
Route::delete("/borrar-cita/{id}",[citasController::class, 'deleteCita']);

//Rutas para resumen consultas
Route::get('/ver-resumen', [ResumenController::class, 'getResumen']);
Route::get('/ver-un-resumen/{id}', [ResumenController::class, 'getSpecificResumen']);
Route::get('/ver-mis-resumenes/{id}', [ResumenController::class, 'getMisResumen']);
Route::post("/crear-resumen",[ResumenController::class, 'postResumen']);
Route::put("/actualizar-resumen/{id}",[ResumenController::class, 'updateResumen']);
Route::delete("/borrar-resumen/{id}",[ResumenController::class, 'deleteResumen']);