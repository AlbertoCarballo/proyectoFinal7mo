<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;
    protected $table = 'pacientes';

    protected $fillable=[
        "nombre",
        "primer_apellido",
        "sefundo_apellido",
        "fecha_nac",
        "correo_electronico",
        "contrasena",
        "genero",
        "peso",
        "estatura",
        "tipo_sangre",
        "numero_telefono",
        "numero_emergencia",
        "nss",

    ];

}
