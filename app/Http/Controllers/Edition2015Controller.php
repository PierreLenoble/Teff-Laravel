<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAL\ArticleManager;

class Edition2015Controller extends TeffController
{
    
    public function homePage($langue) {
        $this->init2015();
        return view('page.2015.home')->with($this->varPage);
    }
    
    public function billeterie($langue) {
        $this->init2015();
        return view('page.2015.billeterie')->with($this->varPage);
    }
    
    // DOING
    
    public function evenements($langue) {
        $this->init2015();
        
        // rapatriement des evenements 2015
        $this->varPage['listeEvenements'] = 
                ArticleManager::getAllArticles($langue, 'Evenement 2015');
        
        // print_r($this->varPage['listeEvenements']->toArray());
        // détermination des adresses des bouttons 'voir evenement' des 
        // evenements
        $tabUrlBoutton = array();
        $paramTab = array();
        $paramTab['langue'] = $langue;
        foreach ($this->varPage['listeEvenements'] as $article) {
            $paramTab['id'] = $article->idArticle;
            $tabUrlBoutton[$article->idArticle] = 
                    route('2015_detailsEvenement', $paramTab);
        }
        $this->varPage['tabUrlBoutton'] = $tabUrlBoutton;
        
        
        return view('page.2015.evenements')->with($this->varPage);
    }
    
    // TODO
    
    public function programme($langue) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function seance($langue) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function films($langue) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function detailFfilm($langue, $idFilm) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function detailEvenement($langue, $idFilm) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function invites($langue) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function detailInvite($langue, $idFilm) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function presse($langue) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function pagePresse($langue, $idPage) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function detailPresse($langue, $idPage) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function infosPratiques($langue) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function jury($langue) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
    
    public function partenaires($langue) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
    }
}
