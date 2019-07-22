<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasilitas;

class FasilitasController extends Controller
{
    public function dashboard(Type $var = null)
    {
        $dashboard = Fasilitas::all();
       
    }
}
