<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'Article';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\ArticleTraduction', 'idArticle', 'idArticle');
    }
    
    public function categorie()
    {
        return $this->hasOne('App\Models\CategorieArticle', 'nomCategorieArticle', 'nomCategorieArticle');
    }
    
}
