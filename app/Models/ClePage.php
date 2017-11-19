<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClePage extends Model
{
    //
    protected $table = 'ClePage';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\PageTextTraduction', 'idClePage', 'idClePage');
    }
    
    public function page()
    {
        return $this->hasOne('App\Models\Page', 'nomPage', 'nomPage');
    }
}
