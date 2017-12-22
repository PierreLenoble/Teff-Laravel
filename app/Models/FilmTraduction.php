<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilmTraduction extends Model
{
    public $timestamps = false;
    protected $table = 'FilmTraduction';
    
    public function langue()
    {
        return $this->hasOne('App\Models\Langue', 'initialLangue', 'initialLangue');
    }
    
    public function film()
    {
        return $this->hasOne('App\Models\Film', 'idFilm', 'idFilm');
    }
}
