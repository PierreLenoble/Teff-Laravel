<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAL\ArticleManager;

class CommonController extends TeffController
{
    protected $nbNewsParPage = 5;
    
    public function news($langue='') {
        return $this->pageNews($langue, 1);
    }
    
    public function pageNews($langue, $page) {
        $this->init2016();
        
        $langue = $this->varPage['langueActuelle'];
        
        // determination du nombre de page
        $nbNews = ArticleManager::getNbArticle($langue, 'News');
        $nbPage = ceil($nbNews / $this->nbNewsParPage) ;
        
        // detection erreur du numero de page demandé
        $page = ($page > $nbPage) ? $nbPage : $page;
        $page = ($page <=0) ? 1 : $page;
        
        // determination de la page actuelle
        $this->varPage['numPageActuel'] = $page;
        
        // rapatriement des articles de la page demandée
        $this->varPage['listeArticles'] = 
                ArticleManager::getArticlePage($langue, 'News', $page, 
                        $this->nbNewsParPage);
        //print_r($this->varPage['listeArticles']->toArray());
        // détermination des adresses des bouttons 'lire la suite' des articles
        $tabUrlBoutton = array();
        $paramTab = array();
        $paramTab['langue'] = $langue;
        foreach ($this->varPage['listeArticles'] as $article) {
            $paramTab['id'] = $article->idArticle;
            $tabUrlBoutton[$article->idArticle] = 
                    route('common_detailNews', $paramTab);
        }
        $this->varPage['tabUrlBoutton'] = $tabUrlBoutton;
        
        // destermination des adresses des differentes pages news
        $tabUrlPage = array();
        $paramTab = array();
        $paramTab['langue'] = $langue;
        for($i=0; $i < $nbPage; $i++) {
            $paramTab['page'] = $i+1;
            $tabUrlPage[$i] = route('common_pageNews', $paramTab);
        }
        $this->varPage['tabUrlPage'] = $tabUrlPage;
        
        $this->varPage['actualPage'] = $page;
        
        // appel et retour de la vue
        return view('page.common.news')->with($this->varPage);
    }
    
    public function detailNews($langue, $idArticle) {
        $this->init2016();
        
        $langue = $this->varPage['langueActuelle'];
        
        $article = ArticleManager::getArticle($langue, 'News', $idArticle);
        if ($article==null) {
            return view('page.common.news_detail_error')->with($this->varPage);
        } else {
            $this->varPage['article'] = $article;
            
            if ($article->ordreArticle % $this->nbNewsParPage > 0) {
                $page = floor($article->ordreArticle / $this->nbNewsParPage) + 1;
            } else {
                $page = floor($article->ordreArticle / $this->nbNewsParPage);
            }
            
            $paramTab = array();
            $paramTab['langue'] = $this->varPage['langueActuelle'];
            $paramTab['page'] = $page;
            $this->varPage['urlBack'] = route('common_pageNews', $paramTab);
            $this->varPage['nbPage'] = $page;
            return view('page.common.news_detail')->with($this->varPage);
        }
        
    }
    
    public function archives($langue) {
        $this->init2016();
        
        return view('page.common.archives')->with($this->varPage);
    }
    
    public function association($langue) {
        $this->init2016($langue);
        
        return view('page.common.association')->with($this->varPage);
    }
    
    public function contact($langue) {
        $this->init2016($langue);
        
        return view('page.common.contact')->with($this->varPage);
    }
}
