<?php

namespace App\DAL;

Class FilmManager extends Manager {
    
    public static function getFilm($nomLangue, $idFilm) {
        return \App\Models\Film::where('idFilm', $idFilm)->whereHas('traductions' , function ($query) use($nomLangue){
            $query->whereHas('langue', function ($query)  use($nomLangue){
                $query->where('initialLangue', $nomLangue);
            });
        })->get()->first();
    }
    
    
    public static function getFilmParAnnee($nomLangue, $annee) {
        return \App\Models\Film::
        whereHas('traductions' , function ($query) use($nomLangue){
            $query->whereHas('langue', function ($query2)  use($nomLangue){
                $query2->where('initialLangue', $nomLangue);
            })->with('langue')->orderBy('nomFilm');
        })->with('traductions')
        ->whereHas('filmParSeances', function($query3) use($annee) {
            $query3->whereHas('seance', function ($query4)  use($annee){
                $query4->whereyear('dateTimeSeance', $annee);
            });
        })->get();
    }
}