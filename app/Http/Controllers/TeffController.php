<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\DAL;
use App\DAL\PageManager;

class TeffController extends Controller {

    protected $arrayMenu = array();
    protected $varPage = array();
    protected $defaultLangage = 'fr';

    private function init() {
        $this->setLangueActuelle();
        $this->setMenuLangue();
        $this->setPath();
        $this->varPage['commonTrad'] = PageManager::getPage('Common');
    }

    protected function init2016() {
        $this->init();
        $this->setMenu2016(false);
    }

    protected function init2015() {
        $this->init();
        $this->setMenu2016(false);
        $this->setMenu2015(true);
    }

    private function setMenu($arrayMenu, $isArchive) {
        if ($isArchive) {
            if (!isset($this->varPage['menuArchive'])) {
                $this->varPage['menuArchive'] = array();
            }
            $this->varPage['menuArchive'] = $arrayMenu;
        } else {
            if (!isset($this->varPage['menu'])) {
                $this->varPage['menu'] = array();
            }
            $this->varPage['menu'] = $arrayMenu;
        }
        
        
    }

    protected function setMenu2016($isArchive) {
        $arrayMenu = array();
        $menuPoint = array();
        
        $menuPoint['name'] = $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_News')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;
        $menuPoint['url'] = route(
                'common_news', 
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_Uccle')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;
        $menuPoint['url'] = route(
                '2016_homePage', 
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_Archives')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;
        $menuPoint['url'] = route(
                'common_archives', 
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_Association')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;;
        $menuPoint['url'] = route(
                'common_association', 
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_Contact')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;
        $menuPoint['url'] = route(
                'common_contact', 
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $this->setMenu($arrayMenu, $isArchive);
    }

    protected function setMenu2015($isArchive) {
        $arrayMenu = array();
        $menuPoint = array();
        
        $menuPoint['name'] = "2015 - " . $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_2015_Films')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;;
        $menuPoint['url'] = route(
                '2015_films',
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = "2015 - " . $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_2015_Programme')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;;
        $menuPoint['url'] = route(
                '2015_programme',
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = "2015 - " . $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_2015_Tarif')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;;
        $menuPoint['url'] = route(
                '2015_billeterie',
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = "2015 - " . $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_2015_Evenements')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;;
        $menuPoint['url'] = route(
                '2015_evenements',
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = "2015 - " . $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_2015_Lieux')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;;
        $menuPoint['url'] = route(
                '2015_lieux',
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = "2015 - " . $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_2015_Accessibilite')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;;
        $menuPoint['url'] = route(
                '2015_accessibilite',
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $menuPoint['name'] = "2015 - " . $this->varPage['commonTrad']->clePages()->where('nomClePage', 'menu_2015_Partenaires')->first()->traductions()->where('initialLangue',$this->varPage['langueActuelle'])->first()->textPage;;
        $menuPoint['url'] = route(
                '2015_partenaires',
                ['langue' => $this->varPage['langueActuelle']]);
        array_push($arrayMenu, $menuPoint);
        
        $this->setMenu($arrayMenu, $isArchive);
    }

    protected function setPath() {
        $this->varPage['path']['css'] = url('/css') . '/';
        $this->varPage['path']['js'] = url('/js') . '/';
        $this->varPage['path']['image'] = url('/image') . '/';
        $this->varPage['path']['download'] = url('/download') . '/';
        $this->varPage['path']['ckeditor'] = url('/ckeditor') . '/';
        $this->varPage['path']['ckfinder'] = url('/ckfinder') . '/';
        $this->varPage['path']['uploadify'] = url('/uploadify') . '/';
    }

    private function setMenuLangue() {
        $paramTab =  Route::getFacadeRoot()->current()->parameters();
        
        $langues = DAL\LangueManager::getAllLangue();
        $langueTab = array();
        foreach ($langues as $langue) {
            $paramTab['langue'] = $langue->initialLangue;
            
            $enrLangue = array();
            $enrLangue['langue'] = $langue->initialLangue;
            $enrLangue['url'] = route($this->getCurrentRouteName(), $paramTab);
            
            array_push($langueTab, $enrLangue);    
        }
        $this->varPage['langues'] = $langueTab;
        
    }
    
    protected function setLangueActuelle() {
        $paramTab =  Route::getFacadeRoot()->current()->parameters();

        if ($paramTab != null) {
            if (isset($paramTab['langue'])) {
                $this->varPage['langueActuelle'] = $paramTab['langue'];
            } else {
                $this->varPage['langueActuelle'] = $this->defaultLangage;
            }
        } else {
            $this->varPage['langueActuelle'] = $this->defaultLangage;
        }
    }
    
    protected function getCurrentRouteName() {
        if (Route::currentRouteName() == "racine") {
            $routeName = "common_news";
        } else {
            $routeName = Route::currentRouteName();
        }
        return $routeName;
    }

}
