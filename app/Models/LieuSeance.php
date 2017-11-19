<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LieuSeance extends Model
{
    //
    protected $table = 'LieuSeance';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\LieuSeanceTraduction', 'adminNomLieuSeance', 'adminNomLieuSeance');
    }
    
    public function seances()
    {
        return $this->hasMany('App\Models\Seance', 'idSeance', 'idSeance');
    }
}
