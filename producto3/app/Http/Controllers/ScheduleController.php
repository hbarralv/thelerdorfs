<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ScheduleController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function mostrarHorarios()
    {
        // Busca todos los cursos
        $horarios = Schedule::all();
        return view('horarios', ['horarios' => $horarios]);
    }


    function crearHorario(Request $request)
    {
        // Creamos las reglas para validar la petición
        $rules = [
            "time_start" => "required",
            "time_end" => "required",
            "day" => "required",
        ];
        // Validamos la petición con las reglas antes creadas

        // 	time_start	time_end	day	updated_at	created_at

        $request->validate($rules);
        Schedule::create([
            "time_start" => $request->input('time_start'),
            "time_end" => $request->input('time_end'),
            "day" => $request->input('day'),
        ]);
        $horarios = Schedule::all();
        return view('horarios', ['horarios' => $horarios]);
    }

    function eliminarHorario(Request $request)
    {
        $id_schedule = $request->input('id_schedule');
        // Busca el horario con el ID que le pasan
        $horario = Schedule::find($id_schedule);
        // Elimina el horario encontrado
        $horario->delete();
        return redirect('/panel/horarios');
    }
}
