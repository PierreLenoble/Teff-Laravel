<?php

namespace App\DAL;

Class ArticleManager extends Manager {
    
    public static function getNbArticle($nomLangue, $nomCategorie) {
        return \App\Models\Article::orderby('ordreArticle')->whereHas('traductions' , function ($query) use($nomLangue){
            $query->whereHas('langue', function ($query)  use($nomLangue){
                $query->where('initialLangue', $nomLangue);
            })->with('langue');
        })->whereHas('categorie' , function ($query) use($nomCategorie){
            $query->where('nomCategorieArticle', $nomCategorie);
        })->count();
    }
    
    public static function getArticlePage($nomLangue, $nomCategorie, $indexPage, $nbParPage) {
        return \App\Models\Article::orderby('ordreArticle')->whereHas('traductions' , function ($query) use($nomLangue){
            $query->whereHas('langue', function ($query)  use($nomLangue){
                $query->where('initialLangue', $nomLangue);
            })->with('langue');
        })->whereHas('categorie' , function ($query) use($nomCategorie){
            $query->where('nomCategorieArticle', $nomCategorie);
        })->with('traductions')->with('categorie')->skip($nbParPage * ($indexPage - 1))->take($nbParPage)->get();
        
    }
    
    public static function getArticle($nomLangue, $nomCategorie, $id) {
        return \App\Models\Article::orderby('ordreArticle')->where('idArticle', $id)->whereHas('traductions' , function ($query) use($nomLangue){
            $query->whereHas('langue', function ($query)  use($nomLangue){
                $query->where('initialLangue', $nomLangue);
            })->with('langue');
        })->whereHas('categorie' , function ($query) use($nomCategorie){
            $query->where('nomCategorieArticle', $nomCategorie);
        })->get()->first();
    }
}
