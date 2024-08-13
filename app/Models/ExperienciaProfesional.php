<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienciaProfesional extends Model
{
    use HasFactory;

    protected $table = 'experiencia_profesional';

    protected $fillable = [
        'practicas_profesionales',
        'empresa_practicas',
        'puesto_practicas',
        'duracion_practicas',
        'servicio_social',
        'servicio_social_acorde',
        'servicio_social_util',
        'experiencia_laboral_previa',
        'areas_interes',
        'tipo_empleo',
        'preferencia_ubicacion',
        'certificaciones',
        'conocimientos_idiomas',
        'habilidades_tecnicas',
        'considera_posgrado',
        'area_posgrado',
        'posgrado_interes',
        'cambio_residencia',
        'interes_oportunidades_internacionales',
        'participacion_mentoria',
        'alumno_id'
    ];

    public function alumno()
    {
        return $this->belongsTo(User::class);
    }
}
