<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenreFilmDuFilm extends Model
{
    public $timestamps = false;
    protected $table = 'GenreFilmDuFilm';
    
    public function genreFilm()
    {
        return $this->hasOne('App\Models\GenreFilm', 'idGenreFilm', 'idGenreFilm');
    }
    
    public function film()
    {
        return $this->hasOne('App\Models\Film', 'idFilm', 'idFilm');
    }
}
