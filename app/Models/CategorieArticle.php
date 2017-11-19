<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorieArticle extends Model
{
    //
    protected $table = 'CategorieArticle';
    
    public function articles()
    {
        return $this->hasMany('App\Models\Article', 'nomCategorieArticle', 'nomCategorieArticle');
    }
    
}
