<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends TeffController
{
    
    
    
    
    
   
    
    
            
    public function test() {
        $this->setPath();
        $this->setMenu2016('fr');
        $this->setMenuArchive2015();
        $this->setLangue();
        $this->setSoutiens2016();
        
        return view('page.2016_test')->with($this->varPage);
    }
    
    
}
