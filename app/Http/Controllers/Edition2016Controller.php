<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Edition2016Controller extends TeffController
{
    
    public function homePage($langue) {
        $this->init2016();
        return view('page.2016.uccle')->with($this->varPage);
    }
    
    public function detailsFilm($langue, $idFilm) {
        $this->init2016();
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
            
            $this->varPage['seances'] = $film->filmParSeances;
            $this->varPage['realisateur'] = $film->realisateur;
            $this->varPage['realisateurTraduction'] = $film->realisateur->traductions->where('initialLangue', $this->varPage['langueActuelle'])->first();
            
            $imgInterdit = '';
            switch ($film->interdictionAge) {
                case "12" : $imgInterdit = $this->varPage['path']['image'] . 'interdit/12.jpg';  break;
                case "16" : $imgInterdit = $this->varPage['path']['image'] . 'interdit/16.jpg';  break;
                case "18" : $imgInterdit = $this->varPage['path']['image'] . 'interdit/18.jpg';  break;
            }
            $this->varPage['imgInterdit']=$imgInterdit;
            return view('page.2016.film_details')->with($this->varPage);
        }
    }
}
