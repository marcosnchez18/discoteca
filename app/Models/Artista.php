<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    public function temas()
    {
        return $this->belongsToMany(Tema::class, 'artistas_temas');
    }

    public function nombres_albumes()
    {
        $canciones = ArtistaTema::where('artista_id', $this->id)->get();
        $nombres_albumes = '';
        foreach ($canciones as $cancion) {
            $nombre = $cancion->tema_id;
            $albumes = AlbumTema::where('tema_id', $nombre)->get();
            foreach ($albumes as $album) {
                $n = $album->album_id;

                $al = Album::find($n);
                $nombres_albumes .= '<li>' . $al->titulo . '</li>';
            }
        }
        return $nombres_albumes ? '<ul>' . $nombres_albumes . '</ul>' : 'Sin albumes';
    }
}
