<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Doctores;
use App\Models\Pacientes;

class CitasMedicas extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_consultas';
    protected $table = 'consultasMedicas';
    protected $fillable = ['id_paciente', 'nombre_paciente', 'id_doctor',"nombre_doctor",
                            'fecha_cita', 'hora_consulta', 'descripcion_problema',
                            'consultorio', 'estado'];
    public function foraneas()
    {
        return $this->belongsTo(Doctores::class, 'id_doctor');
        return $this->belongsTo(Pacientes::class, 'id_paciente');
    }
}
