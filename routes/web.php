<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/usuario', function () {
    return view('usuario');
});

Route::get('/perfil', function () {
    return view('perfildc');
});

Route::get('/mis-consultas', function () {
    return view('misconsultas');
});

Route::get('/mis-citas-dc', function () {
    return view('miscitasdc');
});

Route::get('/editar-cita-dc', function () {
    return view('editarcitadc');
});

Route::get('/editar-cita', function () {
    return view('editarcita');
});

Route::get('/crear-cita-dc', function () {
    return view('crearcitadc');
});

Route::get('/crear-cita', function () {
    return view('crearcita');
});

Route::get('/cancelar-consulta', function () {
    return view('cancelarconsulta');
});

Route::get('/vista-consultas', function () {
    return view('vista-consultas');
});