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

class ProfileController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function mostrarPerfil()
    {
        $rol = request()->cookie('rol');
        $id = request()->cookie('id');

        if ($rol === 'ESTUDIANTE') {
            $estudiante = Student::where('id', $id)->get()->first();
            return view('perfil', ['estudiante' => $estudiante, "done" => false, "duplicado" => false]);
        }else{
            return redirect("/panel");
        }

    }

    function actualizarPerfil(Request $request){
        $rules = [
            "email" => "required|email",
            "name" => "required",
            "surname" => "required",
        ];

        // Validamos la petición con las reglas antes creadas
        $request->validate($rules, [
            "email.required" => "El email es obligatorio",
            "name.required" => "El nombre es obligatorio",
            "surname.required" => "El apellido es obligatorio",
        ]);

        $rol = request()->cookie('rol');
        $id = request()->cookie('id');

        if ($rol === 'ESTUDIANTE') {
            $estudiante = Student::where('id', $id)->get()->first();

            $estudiante->email = $request->email;
            $estudiante->name = $request->name;
            $estudiante->surname = $request->surname;
            if($request->pass){
                $estudiante->pass = $request->pass;
            }

            try {
                $estudiante->save();

            } catch (\Illuminate\Database\QueryException $e) {
                $errorCode = $e->errorInfo[1];
                if ($errorCode == '1062') {
                    // Enviamos vista registro con las flags necesarias
                    return view('perfil', ['estudiante' => $estudiante, "done" => false, "duplicado" => true]);
                }
            }

            return view('perfil', ['estudiante' => $estudiante, "done" => true, "duplicado" => false]);
        }else{
            return redirect("/panel");
        }
    }
}
