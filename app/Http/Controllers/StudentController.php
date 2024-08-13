<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function create()
    {
        $alumnoId = Auth::id(); // Obtiene el ID del alumno autenticado

        // Verifica si el alumno ya ha completado el formulario
        $studentExists = Student::where('alumno_id', $alumnoId)->exists();
        
        if ($studentExists) {
            // Redirige a una vista con un mensaje de información si el formulario ya fue completado
            return view('encuesta_completada')->with('info', 'Ya has completado este formulario.');
        }

        // Muestra el formulario para completar si no se ha completado antes
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $data = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'carrera' => 'required|string|max:255',
            'anio_ingreso' => 'required|integer',
            'anio_egreso' => 'required|integer',
            'matricula' => 'required|string|max:50',
            'correo_institucional' => 'required|email|max:255',
            'correo_personal' => 'nullable|email|max:255',
            'telefono' => 'required|string|max:15',
            'promedio' => 'nullable|numeric|min:0|max:10',
            'actividades_extracurriculares' => 'nullable|string',
            'becas' => 'nullable|string',
            'intercambios' => 'nullable|string',
        ]);

        $alumnoId = Auth::id(); // Obtiene el ID del alumno autenticado
        $data['alumno_id'] = $alumnoId;

        // Crea un nuevo registro en la base de datos
        Student::create($data);

        // Redirige con un mensaje de éxito
        return redirect()->route('welcome')->with('success', 'Estudiante creado exitosamente.');
    }
}

