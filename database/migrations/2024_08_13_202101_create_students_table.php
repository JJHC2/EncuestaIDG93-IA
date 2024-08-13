<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->date('fecha_nacimiento');
            $table->string('carrera');
            $table->year('anio_ingreso');
            $table->year('anio_egreso');
            $table->string('matricula');
            $table->string('correo_institucional');
            $table->string('correo_personal')->nullable();
            $table->string('telefono');
            $table->decimal('promedio', 4, 2)->nullable();
            $table->text('actividades_extracurriculares')->nullable();
            $table->text('becas')->nullable();
            $table->text('intercambios')->nullable();
            $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
