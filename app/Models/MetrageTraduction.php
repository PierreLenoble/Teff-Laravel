<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetrageTraduction extends Model
{
    //
    protected $table = 'MetrageTraduction';
    
    public function langue()
    {
        return $this->hasOne('App\Models\Langue', 'initialLangue', 'initialLangue');
    }
    
    public function metrage()
    {
        return $this->hasOne('App\Models\Metrage', 'initialMetrage', 'initialMetrage');
    }
}
