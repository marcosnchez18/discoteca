<?php

namespace App\Http\Controllers;

use App\Models\AlbumTema;
use App\Models\ArtistaTema;
use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('temas.index', [
            'temas' => Tema::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('temas.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'anyo' => 'required|digits:4',
            'duracion' => 'required|date_format:H:i:s',
        ]);

        $Tema = new Tema();
        $Tema->titulo = $validated['titulo'];
        $Tema->anyo = $validated['anyo'];
        $Tema->duracion = $validated['duracion'];
        $Tema->save();
        session()->flash('success', 'El tema se ha creado correctamente.');
        return redirect()->route('temas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tema $tema)
    {
        return view('temas.show', [
            'tema' => $tema,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tema $tema)
    {
        return view('temas.edit', [
            'tema' => $tema,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tema $tema)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'anyo' => 'required|digits:4',
            'duracion' => 'required|date_format:H:i:s',
        ]);

        $tema->titulo = $validated['titulo'];
        $tema->titulo = $validated['anyo'];
        $tema->titulo = $validated['duracion'];
        $tema->save();
        session()->flash('success', 'tema cambiado correctamente');
        return redirect()->route('temas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        //AlbumTema::where('tema_id', $tema->id)->delete();
        //ArtistaTema::where('tema_id', $tema->id)->delete();   //esto es si queremos que se borre y listo, pero el ejercicio nos dice que se impida borrar
        $r1 = AlbumTema::where('tema_id', $tema->id)->count();
        $r2 = ArtistaTema::where('tema_id', $tema->id)->count();

        if ($r1 > 0 || $r2 > 0) {
            session()->flash('error', 'No se puede borrar una cancion de un artista contenida en un álbum');
            return redirect()->route('temas.index');   //sin esto no funcionaría
        }

        $tema->delete();

        session()->flash('success', 'Canción eliminada correctamente.');
        return redirect()->route('temas.index');
    }
}
