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
        //tabla zoo
    Schema::create('zoo', function (Blueprint $table) {
    $table->id();
    $table->string('nombre')->nullable();
    $table->string('ciudad')->nullable();
    $table->string('pais')->nullable();
    $table->string('tamaño')->nullable();
    $table->string('presupuesto')->nullable();
    $table->timestamp('last_used_at')->nullable();
    $table->timestamps();
    $table->softDeletes();
    });
    //tabla especie
    Schema::create('especie', function (Blueprint $table) {
    $table->id();
    $table->string('nomcientifico')->nullable();
    $table->string('nomvulgar')->nullable();
    $table->string('familia')->nullable();
    $table->string('peligro')->nullable();
    $table->timestamp('last_used_at')->nullable();
    $table->timestamps();
    $table->softDeletes();
    });
    //animal
    Schema::create('animal', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('zoo_id');
    $table->foreign('zoo_id')->references('id')->on('zoo');
    $table->unsignedBigInteger('especie_id');
    $table->foreign('especie_id')->references('id')->on('especie');
    $table->string('sexo')->nullable();
    $table->string('añonacim')->nullable();
    $table->string('pais')->nullable();
    $table->string('continente')->nullable();
    $table->timestamp('last_used_at')->nullable();
    $table->timestamps();
    $table->softDeletes();
    });

    Schema::create('personas', function (Blueprint $table) {
        $table->id();
        $table->string('ci');
        $table->string('nombre');
        $table->string('apellidos');
        $table->string('sexo');
        $table->date('fecha_nacimiento');
        $table->timestamps();
        $table->softDeletes();
    });

    // Tabla grado
    Schema::create('grados', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->timestamps();
        $table->softDeletes();
    });

    // Tabla carrera
    Schema::create('carreras', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('descripcion');
        $table->timestamps();
        $table->softDeletes();
    });

    // Tabla docente
    Schema::create('docentes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('persona_id');
        $table->foreign('persona_id')->references('id')->on('personas');
        $table->string('salario');
        $table->date('fecha_de_ingreso');
        $table->timestamps();
        $table->softDeletes();
    });

    // Tabla docente_grado
    Schema::create('docente_grados', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('grado_id');
        $table->foreign('grado_id')->references('id')->on('grados');
        $table->unsignedBigInteger('docente_id');
        $table->foreign('docente_id')->references('id')->on('docentes');
        $table->string('descripcion');
        $table->timestamps();
        $table->softDeletes();
    });

    // Tabla estudiante
    Schema::create('estudiantes', function (Blueprint $table) {
        $table->id();
        $table->string('descripcion');
        $table->unsignedBigInteger('persona_id');
        $table->foreign('persona_id')->references('id')->on('personas');
        $table->timestamps();
        $table->softDeletes();
    });

    // Tabla matricula
    Schema::create('matriculas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('carrera_id');
        $table->foreign('carrera_id')->references('id')->on('carreras');
        $table->unsignedBigInteger('estudiante_id');
        $table->foreign('estudiante_id')->references('id')->on('estudiantes');
        $table->timestamps();
        $table->softDeletes();
    });

    Schema::create('usuarios', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('nombre');
        $table->string('contrasena');
        $table->timestamps();
        $table->softDeletes();
    });

    Schema::create('rol_usuarios', function (Blueprint $table) {
        $table->unsignedBigInteger('Usuario_id');
        $table->foreign('Usuario_id')->references('id')->on('usuarios');
        $table->string('nombreRol');
        $table->timestamps();
        $table->softDeletes();
    });

    Schema::create('pacientes', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('nombre');
        $table->string('sexo');
        $table->date('fechaNacimineto');
        $table->integer('edad');
        $table->integer('idNum');
        $table->string('aseguradora');
        $table->string('email');
        $table->string('domicilio');
        $table->string('telefono');
        $table->string('otros');
        $table->string('foto');
        $table->unsignedBigInteger('Usuario_id');
        $table->foreign('Usuario_id')->references('id')->on('usuarios');
        $table->timestamps();
        $table->softDeletes();
    });

    Schema::create('citas', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->date('fecha');
        $table->time('hora');
        $table->string('motivoConsulta');
        $table->unsignedBigInteger('Usuario_id');
        $table->foreign('Usuario_id')->references('id')->on('usuarios');
        $table->unsignedBigInteger('Paciente_id');
        $table->foreign('Paciente_id')->references('id')->on('pacientes');
        $table->timestamps();
        $table->softDeletes();
    });

     
    Schema::create('historias', function (Blueprint $table) {
        $table->bigIncrements('id')->autoIncrement();
        $table->date('fechaElaboracion');
        $table->time('hora');
        $table->string('descripcion');
        $table->string('diagnostico');
        $table->string('tratamiento');
        $table->unsignedBigInteger('Usuario_id');
        $table->foreign('Usuario_id')->references('id')->on('usuarios');
        $table->unsignedBigInteger('Paciente_id');
        $table->foreign('Paciente_id')->references('id')->on('pacientes');
        $table->timestamps();
        $table->softDeletes();
    });
   
    

    Schema::create('recetarios', function (Blueprint $table) {
        $table->bigIncrements('id')->autoIncrement();
        $table->unsignedBigInteger('Historia_id');
        $table->foreign('Historia_id')->references('id')->on('historias');
        $table->timestamps();
        $table->softDeletes();
    });

  
  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal');
        Schema::dropIfExists('especie');
        Schema::dropIfExists('zoo');
        Schema::dropIfExists('personas');
        Schema::dropIfExists('grados');
        Schema::dropIfExists('carreras');
        Schema::dropIfExists('matriculas');
        Schema::dropIfExists('estudiantes');
        Schema::dropIfExists('docente_grados');
        Schema::dropIfExists('docentes');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('rol_usuarios');
        Schema::dropIfExists('pacientes');
        Schema::dropIfExists('citas');
        Schema::dropIfExists('historias');
        Schema::dropIfExists('recetarios');

    }
};
