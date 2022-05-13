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

class WorkController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function mostrarTrabajos()
    {

        $rol = request()->cookie('rol');
        $id = request()->cookie('id');

        if ($rol === 'ESTUDIANTE') {
            $trabajos = Work::where('id_student', $id)->get();
            $clases = ClassModel::all();
            $estudiantes = Student::all();
            return view('trabajos', ['trabajos' => $trabajos, 'clases' => $clases, 'estudiantes' => $estudiantes, 'rol' => $rol]);
        }

        if ($rol === 'PROFESOR'|| $rol === 'ADMIN') {
            // Busca todos los trabajos
            $trabajos = Work::all();
            $clases = ClassModel::all();
            $estudiantes = Student::all();
            return view('trabajos', ['trabajos' => $trabajos, 'clases' => $clases, 'estudiantes' => $estudiantes, 'rol' => $rol]);
        }

    }


    function crearTrabajo(Request $request)
    {
        // // Creamos las reglas para validar la petición
        // $rules = [
        //     "id_class" => "required",
        //     "id_student" => "required",
        //     "mark" => "required",
        //     "date" => "required"
        // ];
        // // Validamos la petición con las reglas antes creadas
        // $request->validate($rules);
        Work::create([
            "id_class" => $request->input('id_class'),
            "id_student" => $request->input('id_student'),
            "name" => $request->input('name'),
            "mark" => $request->input('mark'),
            "date" => $request->input('date'),
        ]);
        return redirect('/panel/trabajos');
    }

    function ponerNota(Request $request)
    {
        $id_work = $request->input('id_work');
        $mark = $request->input('mark');
        // Busca el trabajo con el ID que le pasan
        $trabajo = Work::find($id_work);
        // Cambia el estado del trabajo dependiendo del valor que ingresa
        $trabajo->mark = $mark;
        // Guarda la fila
        $trabajo->save();
        return redirect('/panel/trabajos');
    }

    function eliminarTrabajo(Request $request)
    {
        $id_work = $request->input('id_work');
        // Busca el trabajo con el ID que le pasan
        $trabajo = Work::find($id_work);
        // Elimina el trabajo encontrado
        $trabajo->delete();
        return redirect('/panel/trabajos');
    }
}
