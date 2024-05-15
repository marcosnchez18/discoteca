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
        $nombres_albumes = [];
        foreach ($canciones as $cancion) {
            $nombre = $cancion->tema_id;
            $albumes = AlbumTema::where('tema_id', $nombre)->get();
            foreach ($albumes as $album) {
                $n = $album->album_id;
                $al = Album::find($n);
                // Verificar si el nombre del álbum ya ha sido añadido
                if (!in_array($al->titulo, $nombres_albumes)) {
                    $nombres_albumes[] = $al->titulo;
                }
            }
        }
        // Construir la lista de nombres de álbumes
        $lista_nombres_albumes = '';
        foreach ($nombres_albumes as $nombre_album) {
            $lista_nombres_albumes .= '<li>' . $nombre_album . '</li>';
        }
        return $lista_nombres_albumes ? '<ul>' . $lista_nombres_albumes . '</ul>' : 'Sin albumes';
    }


    //public function nombres_albumes()
    //{
    //    $canciones = ArtistaTema::where('artista_id', $this->id)->get();
    //    $nombres_albumes = '';
    //    foreach ($canciones as $cancion) {
    //        $nombre = $cancion->tema_id;
    //        $albumes = AlbumTema::where('tema_id', $nombre)->get();        // de esta forma se pueden repetir los albunes ya que un tema puede pertenecer a 2 artistas
    //        foreach ($albumes as $album) {
    //            $n = $album->album_id;
//
     //           $al = Album::find($n);
     //           $nombres_albumes .= '<li>' . $al->titulo . '</li>';
     //       }
     //   }
    //    return $nombres_albumes ? '<ul>' . $nombres_albumes . '</ul>' : 'Sin albumes';
//  //  }
//}
}
