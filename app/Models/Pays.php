<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    //
    protected $table = 'Pays';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\PaysTraduction', 'initialPays', 'initialPays');
    }
    
    public function paysFilms()
    {
        return $this->hasMany('App\Models\PaysFilm', 'initialPays', 'initialPays');
    }
}
