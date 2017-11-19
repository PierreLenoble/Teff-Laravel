<?php

namespace App\DAL;

Class LangueManager extends Manager {
    
    public static function getAllLangue() {
        return \App\Models\Langue::orderBy('initialLangue')->get();
    }
    
    public static function getActifLangue() {
        return \App\Models\Langue::where('actifLangue',1)->orderBy('initialLangue')->get();
    }
}