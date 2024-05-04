<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Adopcion;

class AdoptaController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el contenido del archivo JSON de perros
        $perros = json_decode(Storage::disk('local')->get('json/perros.json'));

        // Renderizar la vista 'adopta.blade.php' y pasar la lista de perros
        return view('adopta', ['perros' => $perros]);
    }

    public function guardarAdopcion(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
        ]);

        // Obtener los datos del perro desde la solicitud
        $nombre_perro = $request->input('perro_nombre');
        $raza = $request->input('perro_raza');
        $enfermedades = $request->input('perro_enfermedades');
        $vacunas = $request->input('perro_vacunas');
        

        // Crear una nueva instancia de Adopcion y guardar en la base de datos
        $adopcion = new Adopcion([
            'nombre_perro' => $nombre_perro,
            'raza' => $raza,
            'enfermedades' => $enfermedades,
            'vacunas' => $vacunas,
            'nombre_adoptante' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
        ]);
        $adopcion->save();

        // Mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'La solicitud de adopción se ha creado correctamente.');
    }
}
