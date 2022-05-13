<?php

use App\Http\Controllers\Autenticacion;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\Panel;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EnrollmentController;
use Illuminate\Support\Facades\Route;

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

// Punto de entrada "/", redireciona a /ingresar (login)
Route::get('/', function(){
    return redirect("/registro");
});

// Autenticación
Route::get('/ingresar', [Autenticacion::class, 'mostrarIngresar']);
Route::get('/registro', [Autenticacion::class, 'mostrarRegistro']);
Route::post('/registro', [Autenticacion::class, 'registrar']);
Route::post('/ingresar', [Autenticacion::class, 'ingresar']);
Route::get('/desconectar', [Autenticacion::class, 'desconectar']);


// Panel
Route::get('/panel', [Panel::class, 'mostrarPanel']);

// Courses
Route::get('/panel/cursos', [CoursesController::class, 'mostrarCursos']);
Route::post('/panel/cursos', [CoursesController::class, 'crearCurso']);
Route::post('/panel/cursos/cambiar-estado', [CoursesController::class, 'cambiarEstadoCurso']);
Route::post('/panel/cursos/eliminar', [CoursesController::class, 'eliminarCurso']);

// Class
Route::get('/panel/clases', [ClassController::class, 'mostrarClases']);
Route::post('/panel/clases/eliminar', [ClassController::class, 'eliminarClase']);
Route::post('/panel/clases', [ClassController::class, 'crearClase']);


// Schedule
Route::get('/panel/horarios', [ScheduleController::class, 'mostrarHorarios']);
Route::post('/panel/horarios/eliminar', [ScheduleController::class, 'eliminarHorario']);
Route::post('/panel/horarios', [ScheduleController::class, 'crearHorario']);


// Works
Route::get('/panel/trabajos', [WorkController::class, 'mostrarTrabajos']);
Route::post('/panel/trabajos/eliminar', [WorkController::class, 'eliminarTrabajo']);
Route::post('/panel/trabajos/nota', [WorkController::class, 'ponerNota']);

Route::post('/panel/trabajos', [WorkController::class, 'crearTrabajo']);

// Students
Route::get('/panel/estudiantes', [StudentController::class, 'mostrarEstudiantes']);

// Perfil estudiantes
Route::get('/perfil', [ProfileController::class, 'mostrarPerfil']);
Route::post('/perfil', [ProfileController::class, 'actualizarPerfil']);

// Exams
Route::get('/panel/examenes', [ExamController::class, 'mostrarExamenes']);
Route::post('/panel/examenes/nota', [ExamController::class, 'ponerNota']);
Route::post('/panel/examenes/eliminar', [ExamController::class, 'eliminarExamen']);
Route::post('/panel/examenes', [ExamController::class, 'crearExamen']);

// Enrollments
Route::get('/panel/inscripciones', [EnrollmentController::class, 'mostrarInscripciones']);
