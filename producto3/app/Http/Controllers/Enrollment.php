<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class EnrollmentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function mostrarInscripciones()
    {

        $rol = request()->cookie('rol');
        $id = request()->cookie('id');

        if ($rol === 'ESTUDIANTE') {
            $inscripciones = Enrollment::where('id_student', $id)->get();
            $estudiante = Student::where('id', $id)->get();
            return view('inscripciones', ['estudiante' => $estudiante, 'inscripciones' => $inscripciones]);
        }

    }


    function inscribir(Request $request)
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


        // id_enrollment	id_student	id_course	status

        Enrollment::create([
            "id_student" => $request->input('id_student'),
            "id_course" => $request->input('id_course'),
            "status" => $request->input('status'),
        ]);
        return redirect('/panel/inscripciones');
    }

    // function ponerNota(Request $request)
    // {
    //     $id_exam = $request->input('id_exam');
    //     $mark = $request->input('mark');
    //     // Busca el examen con el ID que le pasan
    //     $exam = Exam::find($id_exam);
    //     // Cambia el estado del examen dependiendo del valor que ingresa
    //     $exam->mark = $mark;
    //     // Guarda la fila
    //     $exam->save();
    //     return redirect('/panel/examenes');
    // }

    function eliminarInscripcion(Request $request)
    {
        $id_enrollment = $request->input('id_enrollment');
        // Busca el inscripcion con el ID que le pasan
        $inscripcion = Enrollment::find($id_enrollment);
        // Elimina la inscripcion encontrada
        $inscripcion->delete();
        return redirect('/panel/inscripciones');
    }
}
