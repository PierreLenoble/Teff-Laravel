<?php

namespace App\DAL;

Class EvenementManager extends Manager {
    
    public static function getEvenement($nomLangue, $idEvenement) {
        return \App\Models\Evenement::where('idEvenement', $idEvenement)->whereHas('traductions' , function ($query) use($nomLangue){
            $query->whereHas('langue', function ($query)  use($nomLangue){
                $query->where('initialLangue', $nomLangue);
            });
        })->get()->first();
    }
}