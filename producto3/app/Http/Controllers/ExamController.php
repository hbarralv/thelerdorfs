<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Courses;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ExamController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function mostrarExamenes()
    {

        $rol = request()->cookie('rol');
        $id = request()->cookie('id');


        if ($rol === 'ESTUDIANTE') {
            $examenes = Exam::where('id_student', $id)->get();
            $clases = ClassModel::all();
            $estudiantes = Student::all();
            return view('examenes', ['examenes' => $examenes, 'clases' => $clases, 'estudiantes' => $estudiantes, 'rol' => $rol]);
        }

        if ($rol === 'PROFESOR' || $rol === 'ADMIN') {
            // Busca todos los examenes
            $examenes = Exam::all();
            $clases = ClassModel::all();
            $estudiantes = Student::all();
            return view('examenes', ['examenes' => $examenes, 'clases' => $clases, 'estudiantes' => $estudiantes, 'rol' => $rol]);
        }

    }


    function crearExamen(Request $request)
    {
        // Creamos las reglas para validar la petición
        // $rules = [
        //     "id_class" => "required",
        //     "id_student" => "required",
        //     "mark" => "required",
        //     "date" => "required",

        // ];
        // // Validamos la petición con las reglas antes creadas
        // $request->validate($rules);
        Exam::create([
            "id_class" => $request->input('id_class'),
            "id_student" => $request->input('id_student'),
            "name" => $request->input('name'),
            "mark" => $request->input('mark'),
            "date" => $request->input('date'),
        ]);
        return redirect('/panel/examenes');
    }

    function ponerNota(Request $request)
    {
        $id_exam = $request->input('id_exam');
        $mark = $request->input('mark');
        // Busca el examen con el ID que le pasan
        $exam = Exam::find($id_exam);
        // Cambia el estado del examen dependiendo del valor que ingresa
        $exam->mark = $mark;
        // Guarda la fila
        $exam->save();
        return redirect('/panel/examenes');
    }

    function eliminarExamen(Request $request)
    {
        $id_exam = $request->input('id_exam');
        // Busca el examen con el ID que le pasan
        $exam = Exam::find($id_exam);
        // Elimina el examen encontrado
        $exam->delete();
        return redirect('/panel/examenes');
    }
}
