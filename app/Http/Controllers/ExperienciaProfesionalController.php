<?php
namespace App\Http\Controllers;

use App\Models\ExperienciaProfesional;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienciaProfesionalController extends Controller
{
    public function create()
    {
        $alumnoId = Auth::id(); // ID del alumno autenticado
        
        // Verifica si el estudiante existe en la base de datos
        $student = Student::where('alumno_id', $alumnoId)->first();
        
        if (!$student) {
            // Redirige al formulario de estudiante si no se ha completado
            return redirect()->route('students.create')->with('info', 'Primero completa el formulario de estudiante.');
        }

        // Verifica si el formulario de experiencia profesional ya ha sido completado
        $experienciaExists = ExperienciaProfesional::where('alumno_id', $alumnoId)->exists();

        if ($experienciaExists) {
            // Redirige a la vista de "ya completado" si ya se ha completado el formulario
            return view('experiencia_profesional.completed'); // Crea esta vista
        }

        // Muestra el formulario para completar si no se ha completado antes
        return view('experiencia_profesional.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'practicas_profesionales' => 'required|string|in:Sí,No',
            'empresa_practicas' => 'required|string|max:255',
            'puesto_practicas' => 'required|string|max:255',
            'duracion_practicas' => 'required|string|max:255',
            'servicio_social' => 'required|string|in:Sí,No',
            'servicio_social_acorde' => 'required|string|in:Sí,No,Algunas veces',
            'servicio_social_util' => 'required|string|in:Sí,No,No aplica',
            'experiencia_laboral_previa' => 'required|string',
            'areas_interes' => 'required|string|max:255',
            'tipo_empleo' => 'required|string|in:Tiempo completo,Medio tiempo,Freelance',
            'preferencia_ubicacion' => 'required|string|in:Local,Nacional,Internacional',
            'certificaciones' => 'required|string',
            'conocimientos_idiomas' => 'required|string',
            'habilidades_tecnicas' => 'required|string',
            'considera_posgrado' => 'required|string|in:Sí,No',
            'area_posgrado' => 'required|string|max:255',
            'posgrado_interes' => 'required|string|max:255',
            'cambio_residencia' => 'required|string|in:Sí,No',
            'interes_oportunidades_internacionales' => 'required|string|in:Sí,No',
            'participacion_mentoria' => 'required|string|in:Sí,No',
        ]);

        $alumnoId = Auth::id(); // Obtiene el ID del alumno autenticado
        $data['alumno_id'] = $alumnoId;

        // Crea un nuevo registro en la base de datos
        ExperienciaProfesional::create($data);

        // Redirige con un mensaje de éxito
        return redirect()->route('welcome')->with('success', 'Experiencia profesional guardada exitosamente.');
    }
}
