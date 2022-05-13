<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Courses;
use App\Models\Student;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function mostrarEstudiantes()
    {

        $rol = request()->cookie('rol');
        $id = request()->cookie('id');

        if ($rol === 'ESTUDIANTE') {
            // El estudiante no puede ver a los demás estudiantes, lo redirigimos al inicio
            return redirect("/panel");
        }

        if ($rol === 'PROFESOR'|| $rol === 'ADMIN') {
            // Busca todos los trabajos
            $estudiantes = Student::all();
            return view('estudiantes', ["estudiantes" => $estudiantes]);
        }

    }

}
