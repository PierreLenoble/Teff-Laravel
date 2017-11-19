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
}