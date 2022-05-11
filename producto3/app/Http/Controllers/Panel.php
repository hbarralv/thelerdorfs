<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Panel extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function mostrarPanel()
    {
        $rol = request()->cookie('rol');
        if (!isset($rol)) {
            return redirect('ingresar');
        }
        echo $rol;
        return view('panel');
    }

}
