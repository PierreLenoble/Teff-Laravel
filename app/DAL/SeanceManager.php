<?php

namespace App\DAL;

Class SeanceManager extends Manager {
    public static function getSeance($nomLangue, $idSeance) {
        return \App\Models\Seance::where('idSeance', $idSeance)
        ->whereHas('traductions' , function ($query) use($nomLangue){
            $query->whereHas('langue', function ($query2)  use($nomLangue){
                $query2->where('initialLangue', $nomLangue);
            })->with('langue');
        })->with('traductions')
        ->first();
    }
    public static function getSeanceParAnnee($nomLangue, $annee) {
        return \App\Models\Seance::whereyear('dateTimeSeance', $annee)
        ->whereHas('traductions' , function ($query) use($nomLangue){
            $query->whereHas('langue', function ($query2)  use($nomLangue){
                $query2->where('initialLangue', $nomLangue);
            })->with('langue');
        })->with('traductions')
        ->get();
    }
}
