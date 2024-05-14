<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    public function albumes()
    {
        return $this->belongsToMany(Album::class, 'albumes_temas');
    }

    public function artistas()
    {
        return $this->belongsToMany(Artista::class, 'artistas_temas');
    }

    public function cant_artistas()
    {
        $artistas = ArtistaTema::where('tema_id', $this->id)->get();
        if ($artistas->count() > 0) {
            return $artistas->count();

        }
        else {
            return 'Sin artistas';


        }
    }

    public function cant_albumes()
    {
        $artistas = AlbumTema::where('tema_id', $this->id)->get();
        if ($artistas->count() > 0) {
            return $artistas->count();

        }
        else {
            return 'Sin albunes';


        }
    }
}
