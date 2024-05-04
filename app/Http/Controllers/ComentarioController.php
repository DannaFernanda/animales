<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario; // Asegúrate de que la clase Comentario exista
use Illuminate\Validation\Rule;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => [
                'required',
                'email',
                'regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}\.com$/i', // Valida que el correo electrónico termine con '.com'
            ],
            'comentario' => 'required',
            'valoracion' => 'required|integer|min:1|max:5',
        ], [
            'email.regex' => 'El correo electrónico debe tener la extensión .com',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'comentario.required' => 'El campo comentario es obligatorio.',
            'valoracion.required' => 'La valoración es obligatoria.',
            'valoracion.min' => 'La valoración debe ser al menos 1.', 
        ]);
    
        $comentario = new Comentario;
        $comentario->nombre = $request->input('nombre');
        $comentario->email = $request->input('email');
        $comentario->comentario = $request->input('comentario');
        $comentario->valoracion = $request->input('valoracion');
        $comentario->save();
    
        // Puedes redirigir a una página de éxito o hacer cualquier otra acción necesaria
        return redirect()->back()->with('success', 'Comentario guardado exitosamente');
    }    
    public function mostrarComentarios(Request $request)
    {
        $paginaActual = $request->input('pagina', 1);
        $comentariosPorPagina = 2;
    
        $comentarios = Comentario::orderBy('id', 'desc')
            ->paginate($comentariosPorPagina, ['*'], 'pagina', $paginaActual);
    
        return response()->json([
            'success' => true,
            'comentarios' => $comentarios->items(),
            'totalPaginas' => $comentarios->lastPage(),
            'paginaActual' => $comentarios->currentPage(),
        ]);
    }
}