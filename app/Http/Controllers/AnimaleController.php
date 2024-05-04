<?php

namespace App\Http\Controllers;

use App\Models\Animale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AnimaleController extends Controller
{
    // Muestra una lista paginada de animales
    public function index()
    {
        $animales = Animale::paginate();

        return view('animale.index', compact('animales'))
            ->with('i', (request()->input('page', 1) - 1) * $animales->perPage());
    }

    // Muestra el formulario para crear un nuevo animal
    public function create()
    {
        $animale = new Animale();

        return view('animale.create', compact('animale'));
    }

    // Muestra los detalles de un animal específico
    public function show(Animale $animale)
    {
        return view('animale.show', compact('animale'));
    }

    // Muestra el formulario para editar un animal específico
    public function edit(Animale $animale)
    {
        return view('animale.edit', compact('animale'));
    }

    // Actualiza un animal (con verificación de permisos)
    public function update(Request $request, Animale $animale)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario es "esteban" y tiene las credenciales específicas
        if ($user && $user->name === 'esteban' && $user->email === 'esteban@gmail.com' && Hash::check('esteban07', $user->password)) {
            // Validar los campos si es necesario (usando el método validate directamente)
            $this->validate($request, Animale::$rules);

            // Actualizar el modelo
            $animale->update($request->all());

            // Leer el contenido actual del archivo JSON
            $jsonContent = Storage::get('json/perros.json');

            // Decodificar el contenido JSON en un array PHP
            $perros = json_decode($jsonContent, true);

            // Buscar el índice del animal en el array PHP
            $index = null;
            foreach ($perros as $key => $perro) {
                if ($perro['nombre'] === $animale->nombre) {
                    $index = $key;
                    break;
                }
            }

            // Actualizar los datos del animal en el array PHP si se encontró
            if ($index !== null) {
                $perros[$index]['nombre'] = $animale->nombre;
                $perros[$index]['imagen'] = $animale->imagen;
                $perros[$index]['tipo'] = $animale->tipo;
                $perros[$index]['vacunas'] = is_array($animale->vacunas) ? $animale->vacunas : [$animale->vacunas];
                $perros[$index]['enfermedades'] = is_array($animale->enfermedades) ? $animale->enfermedades : [$animale->enfermedades];
                $perros[$index]['raza'] = $animale->raza;
            }

            // Codificar el array PHP de nuevo en formato JSON
            $newJsonContent = json_encode($perros, JSON_PRETTY_PRINT);

            // Escribir el nuevo contenido en el archivo JSON
            Storage::put('json/perros.json', $newJsonContent);

            return redirect()->route('animales.index')->with('success', 'Animal actualizado exitosamente');
        } else {
            // Redirigir o mostrar un mensaje de error si el usuario no cumple con las condiciones
            return redirect()->route('animales.index')
                ->with('error', 'No tienes permisos para actualizar este animal. Solo visualización permitida.');
        }
    }


    // Elimina un animal (con verificación de permisos)
    public function destroy(Animale $animale)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario es "esteban" y tiene las credenciales específicas
        if ($user && $user->name === 'esteban' && $user->email === 'esteban@gmail.com' && Hash::check('esteban07', $user->password)) {
            // Eliminar el modelo
            $animale->delete();

            // Leer el contenido actual del archivo JSON
            $jsonContent = Storage::get('json/perros.json');

            // Decodificar el contenido JSON en un array PHP
            $perros = json_decode($jsonContent, true);

            // Buscar el índice del animal en el array PHP
            $index = null;
            foreach ($perros as $key => $perro) {
                if ($perro['nombre'] === $animale->nombre) {
                    $index = $key;
                    break;
                }
            }

            // Eliminar el animal del array PHP si se encontró
            if ($index !== null) {
                unset($perros[$index]);
            }

            // Codificar el array PHP de nuevo en formato JSON
            $newJsonContent = json_encode(array_values($perros), JSON_PRETTY_PRINT);

            // Escribir el nuevo contenido en el archivo JSON
            Storage::put('json/perros.json', $newJsonContent);

            return redirect()->route('animales.index')->with('success', 'Animal eliminado exitosamente');
        } else {
            // Redirigir o mostrar un mensaje de error si el usuario no cumple con las condiciones
            return redirect()->route('animales.index')
                ->with('error', 'No tienes permisos para eliminar este animal. Solo visualización permitida.');
        }
    }

    // Otras funciones del controlador...

    public function store(Request $request)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar si el usuario es "esteban" y tiene las credenciales específicas
        if ($user && $user->name === 'esteban' && $user->email === 'esteban@gmail.com' && Hash::check('esteban07', $user->password)) {
            // Validar los campos si es necesario (usando el método validate directamente)
            $this->validate($request, Animale::$rules);

            // Crear un nuevo modelo y asignar los valores del formulario
            $animale = Animale::create($request->all());

            // Leer el contenido actual del archivo JSON
            $jsonContent = Storage::get('json/perros.json');

            // Decodificar el contenido JSON en un array PHP
            $perros = json_decode($jsonContent, true);

            // Convertir vacunas a un arreglo si es una cadena, de lo contrario, mantenerlo como está
            $vacunas = is_array($animale->vacunas) ? $animale->vacunas : explode(',', $animale->vacunas);

            // Convertir enfermedades a un arreglo si es una cadena, de lo contrario, mantenerlo como está
            $enfermedades = is_array($animale->enfermedades) ? $animale->enfermedades : explode(',', $animale->enfermedades);

            // Agregar los datos del nuevo animal al array PHP
            $perros[] = [
                'nombre' => $animale->nombre,
                'imagen' => $animale->imagen,
                'tipo' => $animale->tipo,
                'vacunas' => $vacunas,
                'enfermedades' => $enfermedades,
                'raza' => $animale->raza,
            ];

            // Codificar el array PHP de nuevo en formato JSON
            $newJsonContent = json_encode($perros, JSON_PRETTY_PRINT);

            // Escribir el nuevo contenido en el archivo JSON
            Storage::put('json/perros.json', $newJsonContent);

            return redirect()->route('animales.index')->with('success', 'Animal creado exitosamente');
        } else {
            // Redirigir o mostrar un mensaje de error si el usuario no cumple con las condiciones
            return redirect()->route('animales.index')
                ->with('error', 'No tienes permisos para crear un nuevo animal. Solo visualización permitida.');
        }
    }

}
