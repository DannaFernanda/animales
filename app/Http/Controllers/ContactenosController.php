<?php

namespace App\Http\Controllers;

class ContactenosController extends Controller
{
    public function index()
    {
        // Render the 'contactenos.blade.php' view with contact information
        return view('contactenos');
    }
}
