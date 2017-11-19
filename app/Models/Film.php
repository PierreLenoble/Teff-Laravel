<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    protected $table = 'Film';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\FilmTraduction', 'idFilm', 'idFilm');
    }
    
    public function filmParSeances()
    {
        return $this->hasMany('App\Models\FilmParSeance', 'idFilm', 'idFilm');
    }
    
    public function paysFilms()
    {
        return $this->hasMany('App\Models\PaysFilm', 'idFilm', 'idFilm');
    }
    
    public function genreFilmDuFilms()
    {
        return $this->hasMany('App\Models\GenreFilmDuFilm', 'idFilm', 'idFilm');
    }
    
    public function realisateur()
    {
        return $this->hasOne('App\Models\Realisateur', 'idRealisateur', 'idRealisateur');
    }
    
    public function metrage()
    {
        return $this->hasOne('App\Models\Metrage', 'initialMetrage', 'initialMetrage');
    }
}
