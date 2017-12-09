<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAL\ArticleManager;
use App\DAL\FilmManager;

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
    
    public function evenements($langue) {
        $this->init2015();
        
        // rapatriement des evenements 2015
        $this->varPage['listeEvenements'] = 
                ArticleManager::getAllArticles($langue, 'Evenement 2015');
        
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
    
    public function detailsEvenement($langue, $idEvenement) {
        $this->init2015();
        
        $evenement = ArticleManager::getArticle($this->varPage['langueActuelle'], 'Evenement 2015', $idEvenement);
        
        if ($evenement == null) {
            return view('page.2015.evenement_details_error')->with($this->varPage);
        } else {
            $this->varPage['evenement'] = $evenement;
            $this->varPage['evenementTraduction'] = $evenement->traductions->where('initialLangue', $this->varPage['langueActuelle'])->first() ;
            
            $paramTab = array();
            $paramTab['langue'] = $langue;
            $this->varPage['url_archive_2015_evenements'] = route('2015_evenements', $paramTab);
            return view('page.2015.evenement_details')->with($this->varPage);
        }
    }
    
    // DOING
    public function films($langue='') {

        $this->init2015();
        $this->varPage['listeFilms'] = FilmManager::getFilmParAnnee($langue, 2015);
        
        $langue = $this->varPage['langueActuelle'];
        
        // détermination des adresses des bouttons 'lire la suite' des articles
        $tabUrlBoutton = array();
        $paramTab = array();
        $paramTab['langue'] = $langue;
        foreach ($this->varPage['listeFilms'] as $film) {
            $paramTab['id'] = $film->idFilm;
            $tabUrlBoutton[$film->idFilm] = 
                    route('2015_detailsFilm', $paramTab);
        }
        $this->varPage['tabUrlBoutton'] = $tabUrlBoutton;
        
        // appel et retour de la vue
        return view('page.2015.films')->with($this->varPage);
    }
    
    public function detailsFilm($langue, $idFilm) {
        $this->init2015();
        $film = \App\DAL\FilmManager::getFilm($this->varPage['langueActuelle'], $idFilm);
        
        if ($film == null) {
            return view('page.2015.film_details_error')->with($this->varPage);
        } else {
            $this->varPage['film'] = $film;
            $this->varPage['filmTraduction'] = $film->traductions->where('initialLangue', $this->varPage['langueActuelle'])->first() ;
            $this->varPage['genres'] = $film->genreFilmDuFilms;
            $pays=array();
            foreach ($film->paysFilms as $paysFilm) {
                array_push($pays, $paysFilm->pays->traductions->where('initialLangue', $this->varPage['langueActuelle'])->first()->nomPays);
            }
            $this->varPage['pays'] = $pays;
            $genres = array();
            foreach ($film->genreFilmDuFilms as $genreFilmDuFilms) {
                array_push($genres, $genreFilmDuFilms->genreFilm->traductions->where('initialLangue', $this->varPage['langueActuelle'])->first()->nomGenreFilm);
            }
            $this->varPage['genres'] = $genres;
            
            $seances = array();
            $allSeance = $film->filmParSeances;
            foreach ($allSeance as $filmParSeance) {
                array_push($seances, $filmParSeance->Seance);
            }
            usort($seances, function ($a, $b) {
                if ($a->dateTimeSeance > $b->dateTimeSeance){
                    return 1;
                } else {
                    return 0;
                }
            });
            $this->varPage['seances'] = $seances;
            
            $this->varPage['realisateur'] = $film->realisateur;
            $this->varPage['realisateurTraduction'] = $film->realisateur->traductions->where('initialLangue', $this->varPage['langueActuelle'])->first();
            
            $imgInterdit = '';
            switch ($film->interdictionAge) {
                case "12" : $imgInterdit = $this->varPage['path']['image'] . 'interdit/12.jpg';  break;
                case "16" : $imgInterdit = $this->varPage['path']['image'] . 'interdit/16.jpg';  break;
                case "18" : $imgInterdit = $this->varPage['path']['image'] . 'interdit/18.jpg';  break;
            }
            $this->varPage['imgInterdit']=$imgInterdit;
            return view('page.2015.film_details')->with($this->varPage);
        }
    }
    
    public function invites($langue) {
        $this->init2015();
        return view('page.2015.atodo')->with($this->varPage);
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
