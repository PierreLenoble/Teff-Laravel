<?php

namespace App\DAL;

Class LieuSeanceManager extends Manager {
    public static function getLieuSeance($nomLangue, $annee) {
        return \App\Models\LieuSeance::whereHas('seances', function($query) use($annee) {
            $query->whereyear('dateTimeSeance', $annee);
        })->whereHas('traductions' , function ($query) use($nomLangue){
            $query->whereHas('langue', function ($query2)  use($nomLangue){
                $query2->where('initialLangue', $nomLangue);
            })->with('langue');
        })->with('traductions')->get();
    }
        
}