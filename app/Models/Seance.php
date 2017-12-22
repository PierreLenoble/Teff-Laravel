<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'idSeance';
    protected $table = 'Seance';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\SeanceTraduction', 'idSeance', 'idSeance');
    }
    
    public function lieuSeance()
    {
        return $this->hasOne('App\Models\LieuSeance', 'adminNomLieuSeance', 'adminNomLieuSeance');
    }
}
