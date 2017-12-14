<?php

namespace App\DAL;

Class PageManager extends Manager {
    public static function getPage($nomPage) {
        return \App\Models\Page::where('nomPage', $nomPage)
                
                ->with('clePages')
                ->get()->first();
    }
        
}