<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Edition2016Controller extends TeffController
{
    
    public function homePage($langue = 'fr') {
        $this->init2016($langue);
        return view('page.2016.uccle')->with($this->varPage);
    }
}
