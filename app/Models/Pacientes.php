<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pacientes';
    protected $primaryKey = 'id_paciente';

    protected $fillable=[
        'nombre', 'primer_apellido', 'segundo_apellido', 'fecha_nac',
        'correo_electronico', 'contrasena', 'genero', 'peso', 'estatura',
        'tipo_sangre', 'numero_telefonico', 'numero_emergencia', 'nss'

    ];

}
