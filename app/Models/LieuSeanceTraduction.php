<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LieuSeanceTraduction extends Model
{
    //
    protected $table = 'LieuSeanceTraduction';
    
    public function langue()
    {
        return $this->hasOne('App\Models\Langue', 'initialLangue', 'initialLangue');
    }
    
    public function lieuSeance()
    {
        return $this->hasOne('App\Models\LieuSeance', 'adminNomLieuSeance', 'adminNomLieuSeance');
    }
}
