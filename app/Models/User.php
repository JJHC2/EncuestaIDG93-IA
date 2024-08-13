<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "alumnos";
    protected $fillable = [
        'nombre',
        'app',
        'apm',
        'matricula',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relación con Students
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Relación con ExperienciaProfesional
    public function experienciaProfesionales()
    {
        return $this->hasMany(ExperienciaProfesional::class);
    }
}
