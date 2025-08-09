<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;

class UnidadController extends Controller
{
    public function index()
    {
        $unidades = Truck::all(); // Esto trae todas las unidades de la base de datos
        return view('welcome', compact('unidades'));
    }
    
}
