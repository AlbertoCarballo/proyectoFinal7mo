<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Especialidades extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'especialidades';
    protected $primaryKey = 'id_especialidad';
    protected $fillable=[
        'nombre_especialidad'
    ];
}
