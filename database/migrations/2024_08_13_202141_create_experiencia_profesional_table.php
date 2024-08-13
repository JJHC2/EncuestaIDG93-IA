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
        Schema::create('experiencia_profesional', function (Blueprint $table) {
            $table->id();
            
            // Campos de texto para "Sí" o "No"
            $table->string('practicas_profesionales', 2);  // Solo almacena "Sí" o "No"
            $table->string('servicio_social', 2);
            $table->string('considera_posgrado', 2);
            $table->string('cambio_residencia', 2);
            $table->string('interes_oportunidades_internacionales', 2);
            $table->string('participacion_mentoria', 2);
        
            // Otros campos
            $table->string('empresa_practicas');
            $table->string('puesto_practicas');
            $table->string('duracion_practicas');
            $table->enum('servicio_social_acorde', ['Sí', 'No', 'Algunas veces']);
            $table->enum('servicio_social_util', ['Sí', 'No', 'No aplica']);
            $table->text('experiencia_laboral_previa');
            $table->string('areas_interes');
            $table->enum('tipo_empleo', ['Tiempo completo', 'Medio tiempo', 'Freelance']);
            $table->enum('preferencia_ubicacion', ['Local', 'Nacional', 'Internacional']);
            $table->text('certificaciones');
            $table->text('conocimientos_idiomas');
            $table->text('habilidades_tecnicas');
            $table->string('area_posgrado');
            $table->string('posgrado_interes');
            $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiencia_profesional');
    }
};
