<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Courses;
use App\Models\Schedule;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ClassController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function mostrarClases()
    {
        // Busca todos los cursos
        $cursos = Courses::all();
        $teachers = Teacher::all();
        $clases = ClassModel::all();
        $horarios = Schedule::all();

        return view('clases', ['cursos' => $cursos, 'clases' => $clases, 'profesores' => $teachers, 'horarios' => $horarios]);
    }

    function crearClase(Request $request)
    {
        ClassModel::create([
            "id_teacher" => $request->input('id_teacher'),
            "id_course" => $request->input('id_course'),
            "id_schedule" => $request->input('id_schedule'),
            "name" => $request->input('name'),
            "color" => $request->input('color'),
        ]);
        return redirect('/panel/clases');
    }

    function cambiarEstadoCurso(Request $request)
    {
        $id_curso = $request->input('id_course');
        $active = $request->input('active');
        // Busca el curso con el ID que le pasan
        $curso = Courses::find($id_curso);
        // Cambia el estado del curso dependiendo del valor que ingresa
        $curso->active = $active == 'on' ? 1 : 0;
        // Guarda la fila
        $curso->save();
        return redirect('/panel/cursos');
    }

    function eliminarClase(Request $request)
    {
        $id_class = $request->input('id_class');
        // Busca el curso con el ID que le pasan
        $clase = ClassModel::find($id_class);
        // Elimina el curso encontrado
        $clase->delete();
        return redirect('/panel/clases');
    }
}
