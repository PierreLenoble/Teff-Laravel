<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends TeffController
{
    public function news($langue = 'fr') {
        $this->init2016($langue);
        //$this->setMenuArchive2015();
        
        return view('page.2016.uccle')->with($this->varPage);
    }
    
    public function archives($langue) {
        $this->init2016($langue);
        
        return view('page.common.archives')->with($this->varPage);
    }
    
    public function association($langue) {
        $this->init2016($langue);
        
        return view('page.common.association')->with($this->varPage);
    }
    
    public function contact($langue) {
        $this->init2016($langue);
        
        return view('page.common.contact')->with($this->varPage);
    }
}
