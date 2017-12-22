<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeanceTraduction extends Model
{
    public $timestamps = false;
    protected $table = 'SeanceTraduction';
    
    public function langue()
    {
        return $this->hasOne('App\Models\Langue', 'initialLangue', 'initialLangue');
    }
    
    public function seance()
    {
        return $this->hasOne('App\Models\Seance', 'idSeance', 'idSeance');
    }
}
