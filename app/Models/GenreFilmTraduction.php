<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenreFilmTraduction extends Model
{
    //
    protected $table = 'GenreFilmTraduction';
    
    public function langue()
    {
        return $this->hasOne('App\Models\Langue', 'initialLangue', 'initialLangue');
    }
    
    public function genreFilm()
    {
        return $this->hasOne('App\Models\GenreFilm', 'idGenreFilm', 'idGenreFilm');
    }
}
