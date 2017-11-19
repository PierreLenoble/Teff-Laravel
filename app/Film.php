<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'Film';
    
    
    public function traductions()
    {
        return $this->hasMany('App\Models\ArticleTraduction', 'idFilm', 'idFilm');
    }
    
    public function categorie()
    {
        return $this->hasOne('App\Models\CategorieArticle', 'nomCategorieArticle', 'nomCategorieArticle');
    }
    

}
