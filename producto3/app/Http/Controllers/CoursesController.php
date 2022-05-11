<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class CoursesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function mostrarCursos()
    {
        // Busca todos los cursos
        $cursos = Courses::all();
        return view('cursos', ['cursos' => $cursos]);
    }


    function crearCurso(Request $request)
    {
        // Creamos las reglas para validar la petición
        $rules = [
            "name" => "required",
            "description" => "required",
            "date_start" => "required",
            "date_end" => "required",
        ];
        // Validamos la petición con las reglas antes creadas
        $request->validate($rules);
        Courses::create([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "date_start" => $request->input('date_start'),
            "date_end" => $request->input('date_end'),
            "active" => $request->input('active'),
        ]);
        $cursos = Courses::all();
        return view('cursos', ['cursos' => $cursos]);
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

    function eliminarCurso(Request $request)
    {
        $id_curso = $request->input('id_course');
        // Busca el curso con el ID que le pasan
        $curso = Courses::find($id_curso);
        // Elimina el curso encontrado
        $curso->delete();
        return redirect('/panel/cursos');
    }
}
