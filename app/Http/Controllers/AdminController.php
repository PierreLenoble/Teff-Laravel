<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DAL\ArticleManager;
use App\DAL\FilmManager;
use App\DAL\PageManager;
use Illuminate\Support\Facades\Session;
use DB;
class AdminController extends TeffController
{
    private $nomSiteImage = "http://teff-laravel/image/";
    
    private function afficheCreateRealisateur($erreur='', $confirm='', $nomRealisateur = '', $imgRealisateur = '', $presentationFr='', $presentationEn='') {
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['newRealisateur2Url'] = route('admin_createRealisateur');
        $this->varPage['nomRealisateur'] = $nomRealisateur;
        $this->varPage['imgRealisateur'] = $imgRealisateur;
        $this->varPage['presentationFr'] = $presentationFr;
        $this->varPage['presentationEn'] = $presentationEn;
        
        return view('page.admin.createRealisateur')->with($this->varPage);
    }
    
    
    private function afficheModifRealisateur($erreur='', $confirm='', $idRealisateur='', $nomRealisateur = '', $imgRealisateur = '', $presentationFr='', $presentationEn='') {
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['modifRealisateur2Url'] = route('admin_modifRealisateur', ['idRealisateur'=>$idRealisateur]);
        $this->varPage['nomRealisateur'] = $nomRealisateur;
        $this->varPage['imgRealisateur'] = $imgRealisateur;
        $this->varPage['presentationFr'] = $presentationFr;
        $this->varPage['presentationEn'] = $presentationEn;
        
        return view('page.admin.modifRealisateur')->with($this->varPage);
    }
    
    private function afficheLoginPage($erreur='', $confirm='') {
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['urlLogin'] = route('admin_login');
        
        return view('page.admin.login')->with($this->varPage);
    }
    
    private function afficheHomePage() {
        return view('page.admin.home')->with($this->varPage);
    }
    
    private function afficheAllRealisateur($erreur='', $confirm=''){
        $this->setPath();
        
        $this->varPage['urlNewRealisateur'] = route('admin_createRealisateur');
        $this->varPage['realisateurs'] = \App\Models\Realisateur::orderby('nomRealisateur')->with('traductions')->with('films')->get();
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        
        return view('page.admin.allRealisateur')->with($this->varPage);
    }
    
    public function login(Request $request) {
        $this->setPath();
        if (Session::get('connected')) {
            return $this->afficheHomePage($this->varPage);
        } 
        
        $this->setPath();
        
        if ($request->exists('login') && $request->get('login') == 'admin' && $request->get('password') == 'admin') {
                // connection
                Session::put('connected', true);
                Session::put('time', time());
                // page home
                return $this->afficheHomePage();
        }
        if ($request->exists('login')) {
            return $this->afficheLoginPage("mot de passe incorrect");
        } else {
            return $this->afficheLoginPage("");
        }

    }
    
    public function allRealisateur(){
        $this->setPath();
        return $this->afficheAllRealisateur('', '');
    }
    
    
    
    public function deleteRealisateur($idRealisateur){
        $this->setPath();
        $realisateur = \App\Models\Realisateur::where('idRealisateur', $idRealisateur)->first();
        if ($realisateur == null) {
            return $this->afficheAllRealisateur('le realisateur que vous essayer de supprimer n\'existe pas');
        } else {
            if ($realisateur->films()->count() > 0) {
                return $this->afficheAllRealisateur('le realisateur que vous essayer de supprimer est encore relié a des films. Il n\'a pas été surrpimé');
            } else {
                $trads = $realisateur->traductions()->get();
                
                foreach ($trads as $trad){
                    $query = 'delete from RealisateurTraduction where idRealisateur = '.$trad->idRealisateur.' and initialLangue=\''.$trad->initialLangue.'\'';
                    DB::delete($query);
                }
                $nom = $realisateur->nomRealisateur;
                $realisateur->delete();
                return $this->afficheAllRealisateur('', 'le realisateur "'.$nom.'" a bien été supprimé');
            }
        }
        return $this->afficheAllRealisateur('', '');
    }
    
    public function modifRealisateur($idRealisateur, Request $request=null) {
        $this->setPath();
        $realisateur = \App\Models\Realisateur::where('idRealisateur', $idRealisateur)->first();
        
        $erreur = "";
        if ($request->get('nomRealisateur')==null) {
            
            if ($realisateur == null) {
                return $this->afficheAllRealisateur('le réalisateur que vous essayez de modifier n\'existe pas');
            } else {
                
                return $this->afficheModifRealisateur('', '', $idRealisateur, $realisateur->nomRealisateur, $realisateur->urlImageRealisateur, $realisateur->traductions()->where('initialLangue', 'fr')->first()->presentationRealisateur, $realisateur->traductions()->where('initialLangue', 'en')->first()->presentationRealisateur);
            }
        }else{
            if (strlen($request->get('nomRealisateur')) < 5) {
                $erreur .='Le nom du réalisateur doit faire plus de 5 carractères. "'.$request->get('nomRealisateur').'" n\'en fait que '.strlen($request->get('nomRealisateur')).'.<br>';
                //dd($request->presentationFr);
                return $this->afficheModifRealisateur($erreur, '', $idRealisateur, $request->get('nomRealisateur'), $request->get('imgRealisateur'), $request->presentationFr, $request->presentationEn);
            } else {
                $img = $request->get('imgRealisateur');
                if (substr($img,0,strlen($this->nomSiteImage)) == $this->nomSiteImage){
                    $img = substr($img,strlen($this->nomSiteImage));
                }
                \App\Models\RealisateurTraduction::where([['idRealisateur', '=', $idRealisateur], ['initialLangue', '=', 'fr']])
                        ->update(array('presentationRealisateur' => $request->presentationFr));
                
                
                \App\Models\RealisateurTraduction::where([['idRealisateur', '=', $idRealisateur], ['initialLangue', '=', 'en']])
                        ->update(array('presentationRealisateur' => $request->presentationEn));
                
                \App\Models\Realisateur::where('idRealisateur', $idRealisateur)
                        ->update(array('nomRealisateur'=>$request->get('nomRealisateur'), 'urlImageRealisateur'=>$img));
                
                return $this->afficheAllRealisateur('','le réalisateur "'. $request->get('nomRealisateur') .'" a bien été modifié');
            }
        }
    }
    
    public function createRealisateur(Request $request) {
        $this->setPath();
        $erreur = "";
        
        if (!$request->exists('nomRealisateur')){
            return $this->afficheCreateRealisateur();
        } else {
            $nomRealisateur = $request->get('nomRealisateur');
            $image = $request->get('imgRealisateur');
            $presentationFr = $request->get('presentationFr');
            $presentationEn = $request->get('presentationEn');
            
            if (substr($image,0,strlen($this->nomSiteImage)) == $this->nomSiteImage){
                $image = substr($image,strlen($this->nomSiteImage));
            }
            $erreur = '';
            
            if (strlen($nomRealisateur) < 5) {
                $erreur .='Le nom du réalisateur doit faire plus de 5 carractères. "'.$nomRealisateur.'" n\'en fait que '.strlen($nomRealisateur).'.<br>';
            }
            
            if (strlen($image) < 5) {
                $erreur .='Le réalisateur doit avoir une image.<br>';
            }
            
            if (strlen($presentationFr) < 5) {
                $erreur .='Le réalisateur doit avoir un texte de presentation en francais.<br>';
            }
            
            if (strlen($presentationEn) < 5) {
                $erreur .='Le réalisateur doit avoir un texte de presentation en anglais.<br>';
            }
            
            if ($erreur != '') {
                return $this->afficheCreateRealisateur($erreur, '', $nomRealisateur, $image, $presentationFr, $presentationEn);
            } else {
                $realisateur = new \App\Models\Realisateur;
                $realisateur->nomRealisateur = $nomRealisateur;
                $realisateur->urlImageRealisateur = $image;
                $realisateur->save();
                $id=$realisateur->idRealisateur;
                
                $tradFr = new \App\Models\RealisateurTraduction;
                $tradFr->initialLangue = 'fr';
                $tradFr->presentationRealisateur = $presentationFr;
                $tradFr->idRealisateur = $id;
                $tradFr->save();

                $tradEn = new \App\Models\RealisateurTraduction;
                $tradEn->initialLangue = 'en';
                $tradEn->presentationRealisateur = $presentationEn;
                $tradEn->idRealisateur = $id;
                $tradEn->save();

                return $this->afficheAllRealisateur('', 'Le réalisateur "'.$nomRealisateur.'" a bien été enregistré');
            }
            
        }
        
    }
    
    
    public function disconnect() {
        $this->setPath();
        
        Session::put('connected', false); 
        Session::put('time', 0); 
        
        return $this->afficheLoginPage();
    }
    
    public function page() {
        $this->setPath();
        
        return "page";
    }
}