<?php

namespace App\Http\Controllers;

use App\Models\AlbumTema;
use App\Models\ArtistaTema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumTemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function insertar(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'album_id' => 'required|exists:albumes,id',
            'tema_id' => 'required|exists:temas,id',
        ]);

        // Crea un nuevo registro en la tabla de relación entre álbumes y temas


        $registros = AlbumTema::where('album_id', $request->album_id)
                ->where('tema_id', $request->tema_id)
                ->count();

        $tiene_artista = ArtistaTema::where('tema_id', $request->tema_id)->count();

        if ($tiene_artista == 0) {
            return redirect()->route('albumes.inserta')->with('error', 'Este tema no tiene artista asignado');
        }
        else {
            if ($registros == 0) {
                DB::table('albumes_temas')->insert([
                    'album_id' => $request->album_id,
                    'tema_id' => $request->tema_id,
                ]);
                return redirect()->route('albumes.inserta')->with('success', 'El registro se ha insertado correctamente.');
            }
            else {
                return redirect()->route('albumes.inserta')->with('error', 'Este tema ya está en el álbum.');
            }
        }

    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AlbumTema $albumTema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlbumTema $albumTema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlbumTema $albumTema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlbumTema $albumTema)
    {
        //
    }
}
