<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_completo',
        'fecha_nacimiento',
        'carrera',
        'anio_ingreso',
        'anio_egreso',
        'matricula',
        'correo_institucional',
        'correo_personal',
        'telefono',
        'promedio',
        'actividades_extracurriculares',
        'becas',
        'intercambios',
        'alumno_id'
    ];

    public function alumno()
    {
        return $this->belongsTo(User::class);
    }
}
