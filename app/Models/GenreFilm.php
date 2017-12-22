<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenreFilm extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idGenreFilm';
    protected $table = 'GenreFilm';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\GenreFilmTraduction', 'idGenreFilm', 'idGenreFilm');
    }
    
    public function genreFilmDuFilms()
    {
        return $this->hasMany('App\Models\GenreFilmDuFilm', 'idGenreFilm', 'idGenreFilm');
    }
}
