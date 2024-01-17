<?php

use App\Http\Controllers\ZooController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaFormController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\Docente_gradoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Rol_usuarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\RecetarioController;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  Route::get('/', function () {
     return view('menu');
  });

Route::resource('zoo',ZooController::class);
Route::resource('especie',EspecieController::class);
Route::resource('animal',AnimalController::class);
Route::resource('grado',GradoController::class);
Route::resource('carrera',CarreraController::class);
Route::resource('persona',PersonaController::class);
Route::resource('estudiante',EstudianteController::class);
Route::resource('matricula',MatriculaController::class);
Route::resource('docente',DocenteController::class);
Route::resource('docente_grado',Docente_gradoController::class);
Route::resource('usuario',UsuarioController::class);
Route::resource('rol_usuario',Rol_usuarioController::class);
Route::resource('paciente',PacienteController::class);
Route::resource('cita',CitaController::class);
Route::resource('historia',HistoriaController::class);
Route::resource('recetario',RecetarioController::class);







