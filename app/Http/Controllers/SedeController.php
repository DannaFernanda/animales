<?php

namespace App\Http\Controllers;

class SedeController extends Controller
{
    public function index()
    {
        // Render the 'sede.blade.php' view with location information (address, map, etc.)
        return view('sede');
    }
}
