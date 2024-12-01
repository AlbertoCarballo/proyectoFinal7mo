<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PacientesController;

Route::get('/pacientes', [PacientesController::class, 'getPacientes']);


Route::post("/pacientes",[PacientesController::class, 'postPacientes']);

Route::put("/pacientes",function(){
return "lista de pacientes";
});

Route::delete("/pacientes/{id}",function(){
    return "lista de pacientes";
    });