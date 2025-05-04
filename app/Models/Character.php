<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $connection = 'mongodb';
    protected $fillable = ['nombre', 'descripcion', 'imagen', 'movie_ids'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, null, 'character_movie', 'movie_character');
    }
}