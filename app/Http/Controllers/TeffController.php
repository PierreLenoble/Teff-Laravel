<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeffController extends Controller
{
    protected $varPage = array();
    protected $langue = 'fr';
    
    protected function init($langue) {
        $this->setPath();
        $this->setLangue($langue);
    }
    
    protected function init2016($langue) {
        $this->init($langue);
        $this->setMenu2016();
        $this->setSoutiens2016();
    }

    protected function setSoutiens2016() {
        $this->varPage['traduction']['soutiens'] = "avec les soutiens : ";
    }
    
    protected function setMenu2016() {
        $this->varPage['menu'][1]['name'] = "News";
        $this->varPage['menu'][1]['url'] = route('common_news', ['langue' => $this->langue]);
        $this->varPage['menu'][2]['name'] = "Uccle 2016";
        $this->varPage['menu'][2]['url'] = route('2016_homePage', ['langue' => $this->langue]);
        $this->varPage['menu'][3]['name'] = "archives";
        $this->varPage['menu'][3]['url'] = route('common_archives', ['langue' => $this->langue]);
        $this->varPage['menu'][4]['name'] = "L'association";
        $this->varPage['menu'][4]['url'] = route('common_association', ['langue' => $this->langue]);
        $this->varPage['menu'][5]['name'] = "Contact";
        $this->varPage['menu'][5]['url'] = route('common_contact', ['langue' => $this->langue]);
    }
    
    protected function setMenuArchive2015() {
        $this->varPage['menuArchive'][1]['name'] = "2015 - test";
        $this->varPage['menuArchive'][1]['url'] = route('test');
        $this->varPage['menuArchive'][2]['name'] = "2015 - test2";
        $this->varPage['menuArchive'][2]['url'] = route('test');
    }
    
     protected function setPath() {
        $this->varPage['path']['css'] = url('/css').'/';
        $this->varPage['path']['js'] = url('/js').'/';
        $this->varPage['path']['image'] = url('/image').'/';
        $this->varPage['path']['download'] = url('/download').'/';
    }
    
    protected function setLangue() {
        $this->varPage['langueSite'][1] = "fr";
        $this->varPage['langueSite'][2] = "en";
        $this->varPage['langueSite'][3] = "nl";
        
        $this->varPage['langueActuelle'] = "fr";
    }
}
