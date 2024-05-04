<?php

namespace App\Http\Controllers;

use App\Models\Animal; // Assuming you have an 'Animal' model

class InicioController extends Controller
{
    public function index()
    {
        // Fetch featured animals (e.g., top 3 most adoptable)
        $featuredAnimals = Animal::limit(3)->get();

        // Render the 'inicio.blade.php' view and pass featured animals
        return view('inicio', ['featuredAnimals' => $featuredAnimals]);
    }
}
