<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Realisateur extends Model
{
    //
    protected $table = 'Realisateur';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\RealisateurTraduction', 'idRealisateur', 'idRealisateur');
    }
    
    public function films()
    {
        return $this->hasMany('App\Models\Film', 'idRealisateur', 'idRealisateur');
    }
    
}
