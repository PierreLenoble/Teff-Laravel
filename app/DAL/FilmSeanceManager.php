<?php

namespace App\DAL;

Class FilmSeanceManager extends Manager {
    
    public static function getFilmParSeanceParSeance($nomLangue, $idSeance) {
        return \App\Models\FilmParSeance::where('idSeance', $idSeance)->orderby('ordreFilm')->get();
    }
}

