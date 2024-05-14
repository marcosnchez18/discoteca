<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumTema extends Model
{
    use HasFactory;

    protected $table = 'albumes_temas';
    protected $fillable = ['album_id', 'tema_id'];
    
}
