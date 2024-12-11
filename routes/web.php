<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/perfil', function () {
    return view('perfildc');
});

Route::get('/mis-citas', function () {
    return view('miscitasdc');
});

Route::get('/editar-cita/{id}', function () {
    return view('editarcitadc');
});

Route::get('/crear-cita', function () {
    return view('crearcitadc');
});

Route::get('/vista-consultas', function () {
    return view('vista-consultas');
});

Route::get('/resumen/{id}', function () {
    return view('resumen');
});
