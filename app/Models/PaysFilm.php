<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaysFilm extends Model
{
    public $timestamps = false;
    protected $table = 'PaysFilm';
    
    public function pays()
    {
        return $this->hasOne('App\Models\Pays', 'initialPays', 'initialPays');
    }
    
    public function film()
    {
        return $this->hasOne('App\Models\Film', 'idFilm', 'idFilm');
    }
}
