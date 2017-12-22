<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleTraduction extends Model
{
    public $timestamps = false;
    protected $table = 'ArticleTraduction';
    
    public function langue()
    {
        return $this->hasOne('App\Models\Langue', 'initialLangue', 'initialLangue');
    }
    
    public function article()
    {
        return $this->hasOne('App\Models\Article', 'idArticle', 'idArticle');
    }
}
