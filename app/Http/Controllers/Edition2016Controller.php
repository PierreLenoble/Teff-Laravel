<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAL\PageManager;

class Edition2016Controller extends TeffController
{
    
    public function homePage($langue) {
        $this->init2016();
        
        $this->varPage['pageTrad'] = PageManager::getPage('Uccle');
        
        return view('page.2016.uccle')->with($this->varPage);
    }
    
    public function detailsFilm($langue, $idFilm) {
        $this->init2016();
        
        $this->varPage['pageTrad'] = PageManager::getPage('2015_Film');
        
        $film = \App\DAL\FilmManager::getFilm($this->varPage['langueActuelle'], $idFilm);
        
        if ($film == null) {
            return view('page.2016.film_details_error')->with($this->varPage);
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
            
            $this->varPage['realisateur'] = $film->realisateur;
            $this->varPage['realisateurTraduction'] = $film->realisateur->traductions->where('initialLangue', $this->varPage['langueActuelle'])->first();
            
            return view('page.2016.film_details')->with($this->varPage);
        }
    }
}
