<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Doctores;

class ResumenConsultas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_resumen_consulta';
    protected $table = 'resumenConsulta';
    protected $fillable = ['id_consulta_medica', 'nombre_paciente', 'id_doctor',
                            'nombre_doctor', 'fecha_consulta', 'resumen_consulta'];
    public function foraneas()
    {
        return $this->belongsTo(Doctores::class, 'id_doctor');
    }
}
