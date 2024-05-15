<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albumes';

    public function temas()
    {
        return $this->belongsToMany(Tema::class, 'albumes_temas');
    }

    public function nombres_canciones()
    {
        $canciones = AlbumTema::where('album_id', $this->id)->get();
        $nombres_canciones = '';
        foreach ($canciones as $cancion) {
            $nombre = $cancion->tema_id;

            $al = Tema::find($nombre);
            $nombres_canciones .= '<li>' . $al->titulo . '</li>';
        }
        return $nombres_canciones ? '<ul>' . $nombres_canciones . '</ul>' : 'Sin canciones';
    }

    public function duracion_album()
    {
        $registros = AlbumTema::where('album_id', $this->id)->get();
        $duracion = 0;

        foreach ($registros as $registro) {
            $cancion = Tema::find($registro->tema_id);
            $tiempo = $cancion->duracion;

            $total_cancion = Carbon::createFromFormat('H:i:s', $tiempo);
            $duracion += $total_cancion->hour * 3600 + $total_cancion->minute * 60 + $total_cancion->second;
        }

        // Convertir la duración total de segundos a formato minutos:segundos
        $minutos = floor($duracion / 60);
        $segundos = $duracion % 60;

        return sprintf('%02d:%02d', $minutos, $segundos);
    }

}
