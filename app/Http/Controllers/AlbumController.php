<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\AlbumTema;
use App\Models\Tema;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('albumes.index', [
            'albumes' => Album::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albumes.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'anyo' => 'required|digits:4',
        ]);

        $album = new Album();
        $album->titulo = $validated['titulo'];
        $album->anyo = $validated['anyo'];    //ojooooooo -> anyo ojo coy paste
        $album->save();
        session()->flash('success', 'El álbum se ha creado correctamente.');
        return redirect()->route('albumes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('albumes.show', [
            'album' => $album,
            'temas' => Tema::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albumes.edit', [
            'album' => $album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:255',
            'anyo' => 'required|digits:4',
        ]);

        $album->titulo = $validated['titulo'];
        $album->anyo = $validated['anyo'];
        $album->save();
        session()->flash('success', 'Álbum cambiado correctamente');
        return redirect()->route('albumes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {

        //AlbumTema::where('arlbum_id', $album->id)->delete();
        //AlbumArtista::where('album_id', $album->id)->delete();   //esto es si queremos que se borre y listo, pero el ejercicio nos dice que se impida borrar
        $r1 = AlbumTema::where('album_id', $album->id)->count();

        if ($r1 > 0) {
            session()->flash('error', 'No se puede borrar una album con temas');
            return redirect()->route('albumes.index');   //sin esto no funcionaría
        }


        $album->delete();
        session()->flash('success', 'Album eliminado correctamente.');
        return redirect()->route('albumes.index');
    }
}
