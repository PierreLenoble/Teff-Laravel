<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RealisateurTraduction extends Model
{
    public $timestamps = false;
    
    
    protected $table = 'RealisateurTraduction';
    
    public function langue()
    {
        return $this->hasOne('App\Models\Langue', 'initialLangue', 'initialLangue');
    }
    
    public function realisateur()
    {
        return $this->hasOne('App\Models\Realisateur', 'idRealisateur', 'idRealisateur');
    }
}
