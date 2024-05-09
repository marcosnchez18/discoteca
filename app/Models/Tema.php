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
}
