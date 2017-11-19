<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $table = 'Page';
    
    public function clePages()
    {
        return $this->hasMany('App\Models\ClePage', 'nomPage', 'nomPage');
    }
}
