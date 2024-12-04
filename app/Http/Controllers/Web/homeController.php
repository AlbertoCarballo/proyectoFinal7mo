<?php

namespace App\Http\Controllers\Web; // Asegúrate de que esta es la ruta correcta si estás organizando tus controladores en una subcarpeta "Web"
session_start();
use App\Http\Controllers\Controller; // Importa el controlador base de Laravel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Doctores;


class HomeController extends Controller
{
    public function index()
    {
        $user_id = Session::get('user_id');
        $tipo_usuario = Session::get('tipo_usuario');
        return view('home', compact('user_id', 'tipo_usuario'));
    }
    public function getDoctores() {
        try {
            $doctores = Doctores::all();
            return view('home', compact('doctores')); 
        } catch (\Exception $e) {
            Log::error('Error al obtener doctores: ' . $e->getMessage());
            return redirect()->route('errorPage'); 
        }
    }
}
