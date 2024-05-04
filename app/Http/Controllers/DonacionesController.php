<?php

namespace App\Http\Controllers;

class DonacionesController extends Controller
{
    public function index()
    {
        // Render the 'donaciones.blade.php' view with donation options and instructions
        return view('donaciones');
    }
}
