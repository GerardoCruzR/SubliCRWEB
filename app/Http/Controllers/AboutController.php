<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        // Retorna la vista 'about-us'
        return view('about-us');
    }
}
