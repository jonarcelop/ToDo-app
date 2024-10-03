<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    // Mostrar todas las notas del usuario autenticado
    public function index()
    {
        // Obtener las notas del usuario autenticado
        $notes = Note::where('user_id', Auth::id())->get();
        return view('notes', compact('notes'));
    }

    // Mostrar formulario para crear una nueva nota
    public function create()
    {
        return view('note-form');
    }

    // Guardar una nueva nota
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Crear la nota
        Note::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        // Redirigir al listado de notas con un mensaje de éxito
        return redirect()->route('notes.index')->with('success', 'Nota creada exitosamente.');
    }

    // Mostrar formulario para editar una nota existente
    public function edit($id)
    {
        $note = Note::findOrFail($id);

        // Verificar si el usuario autenticado es dueño de la nota
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Acción no autorizada.');
        }

        return view('note-form', compact('note'));
    }

    // Actualizar una nota existente
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        // Verificar si el usuario autenticado es dueño de la nota
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Acción no autorizada.');
        }

        // Validar los datos actualizados
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Actualizar la nota
        $note->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Redirigir al listado de notas con un mensaje de éxito
        return redirect()->route('notes.index')->with('success', 'Nota actualizada exitosamente.');
    }

    // Eliminar una nota
    public function destroy($id)
    {
        $note = Note::findOrFail($id);

        // Verificar si el usuario autenticado es dueño de la nota
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Acción no autorizada.');
        }

        // Eliminar la nota
        $note->delete();

        // Redirigir al listado de notas con un mensaje de éxito
        return redirect()->route('notes.index')->with('success', 'Nota eliminada exitosamente.');
    }

    // Mostrar una nota específica
    public function show($id)
    {
        $note = Note::findOrFail($id);

        // Verificar si el usuario autenticado es dueño de la nota
        if ($note->user_id !== Auth::id()) {
            abort(403, 'Acción no autorizada.');
        }

        return response()->json($note);
    }
}

