<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTextTraduction extends Model
{
    //
    protected $table = 'PageTextTraduction';
    
    public function langue()
    {
        return $this->hasOne('App\Models\Langue', 'initialLangue', 'initialLangue');
    }
    
    public function clePage()
    {
        return $this->hasOne('App\Models\ClePage', 'idClePage', 'idClePage');
    }
}
