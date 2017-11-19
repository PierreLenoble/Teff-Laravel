<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmParSeance extends Model
{
    //
    protected $table = 'FilmParSeance';
    
    public function seance()
    {
        return $this->hasOne('App\Models\Seance', 'idSeance', 'idSeance');
    }
    
    public function film()
    {
        return $this->hasOne('App\Models\Film', 'idFilm', 'idFilm');
    }
}
