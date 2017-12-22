<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
    public $timestamps = false;
    protected $table = 'Article';
    protected $primaryKey = 'idArticle';
    
    public function traductions()
    {
        return $this->hasMany('App\Models\ArticleTraduction', 'idArticle', 'idArticle');
    }
    
    public function categorie()
    {
        return $this->hasOne('App\Models\CategorieArticle', 'nomCategorieArticle', 'nomCategorieArticle');
    }
    
}
