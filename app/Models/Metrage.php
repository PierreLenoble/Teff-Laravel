<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metrage extends Model
{
    //
    protected $table = 'Metrage';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\MetrageTraduction', 'initialMetrage', 'initialMetrage');
    }
    
    public function films()
    {
        return $this->hasMany('App\Models\Film', 'initialMetrage', 'initialMetrage');
    }
}
