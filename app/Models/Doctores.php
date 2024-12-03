<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Especialidades;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctores extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'doctores';
    protected $primaryKey = 'id_doctor';

    protected $fillable=[
        'nombre', 'primer_apellido', 'segundo_apellido','correo_electronico', 'contrasena',
        "id_especialidad",'consultorio', 'cedula_profesional',
        'rfc', 'alama_mater'
    ];
    public function especialidad()
    {
        return $this->belongsTo(Especialidades::class, 'id_especialidad');
    }
}
