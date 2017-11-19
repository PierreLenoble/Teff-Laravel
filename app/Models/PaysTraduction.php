<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaysTraduction extends Model
{
    //
    protected $table = 'PaysTraduction';
    
    public function langue()
    {
        return $this->hasOne('App\Models\Langue', 'initialLangue', 'initialLangue');
    }
    
    public function pays()
    {
        return $this->hasOne('App\Models\Pays', 'initialPays', 'initialPays');
    }
}
