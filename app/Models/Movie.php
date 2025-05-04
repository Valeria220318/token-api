<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Movie extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['nombre', 'clasificacion', 'fecha_estreno', 'resena', 'temporada'];

    public function characters()
    {
        return $this->belongsToMany(Character::class, null, 'movie_character', 'character_movie');
    }
}

