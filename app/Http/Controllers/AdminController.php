<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\ArticleTraduction;
use App\Models\Film;
use App\Models\FilmTraduction;
use App\Models\Realisateur;
use App\Models\RealisateurTraduction;
use App\Models\GenreFilm;
use App\Models\GenreFilmDuFilm;
use App\Models\Pays;
use App\Models\Seance;
use App\Models\SeanceTraduction;
use App\Models\LieuSeance;
use App\Models\FilmParSeance;
use App\Models\PaysFilm;
use App\Models\Metrage;
use App\Models\ClePage;
use App\Models\PageTextTraduction;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use DB;


class AdminController extends TeffController
{
    private $nomSiteImage = "http://teff-laravel/image/";
    
    private function deleteImage($image) {
        $imgPath = 'image/'.urldecode($image);
        if (file_exists($imgPath)) {
            File::delete($imgPath);
        }
    }
    
    private function modifImageName($image){
        if (substr($image,0,strlen($this->nomSiteImage)) == $this->nomSiteImage){
            $image = substr($image,strlen($this->nomSiteImage));
        }
        return $image;
    }
    
    private function getString($string){
        return ($string == null ? "" : $string);
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
        
        $this->varPage['newRealisateurUrl'] = route('admin_createRealisateur');
        $this->varPage['realisateurs'] = Realisateur::orderby('nomRealisateur')->with('traductions')->with('films')->get();
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        
        return view('page.admin.allRealisateur')->with($this->varPage);
    }
    
    private function afficheAllFilm($erreur='', $confirm=''){
        $this->setPath();
        
        $this->varPage['newFilmUrl'] = route('admin_createFilm');
        $this->varPage['films'] = Film::
                with(
                    ['traductions'=> function ($query) {
                        $query->where('initialLangue', 'fr')->orderby('nomFilm');
                    }])
                ->with(
                    ['filmParSeances'=>function ($query){
                        $query->with(['Seance'=>function ($query) {
                            $query->with('traductions');
                        }]);
                    }])->get();

                
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        
        return view('page.admin.allFilm')->with($this->varPage);
    }
    
    private function afficheModifTraduction($traduction, $erreur='', $confirm=''){
        $this->setPath();
        
        $this->varPage['tabTxt'] = array(73,74,100,68,69,77,89,79,85,109,93,91,97,83,95,87,75,106,107,8,6,10,12);
        
        $this->varPage['traductions'] = $traduction;
        $this->varPage['modifTraductionUrl'] = route('admin_modifTraduction');
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        
        return view('page.admin.modifTraduction')->with($this->varPage);
    }
    
    private function afficheAllArticle($typeArticle, $erreur='', $confirm=''){
        $this->setPath();
        switch ($typeArticle) {
            case "Evenement 2015" : 
                $this->varPage['newArticleUrl'] = route('admin_createEvenement2015');
                $this->varPage['articles'] = Article::orderby('ordreArticle')->where('nomCategorieArticle', 'Evenement 2015')->with('traductions')->get();
                break;
            
            case "News" : 
                $this->varPage['newArticleUrl'] = route('admin_createNews');
                $this->varPage['articles'] = Article::orderby('ordreArticle')->where('nomCategorieArticle', 'News')->with('traductions')->get();
                break;
        }
        
        $this->varPage['typeArticle'] = $typeArticle;
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        
        return view('page.admin.allArticle')->with($this->varPage);
    }
    
    private function afficheAllSeance($erreur='', $confirm=''){
        $this->setPath();
        
        $this->varPage['seances'] = Seance::orderby('dateTimeSeance')->get();
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['newSeanceUrl'] = route('admin_createSeance');
        
        return view('page.admin.allSeance')->with($this->varPage);
    }
    
    private function afficheCreateArticle($typeArticle, $erreur='', $confirm='', $titreArticleFr = '', $titreArticleEn = '', $imgArticle='', $contenuArticleFr='', $contenuArticleEn='') {
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        switch ($typeArticle) {
            case "Evenement 2015" : $this->varPage['newArticleUrl'] = route('admin_createEvenement2015'); break;
            case "News" : $this->varPage['newArticleUrl'] = route('admin_createNews'); break;
        }
        
        $this->varPage['typeArticle'] = $typeArticle;
        $this->varPage['titreArticleFr'] = $titreArticleFr;
        $this->varPage['titreArticleEn'] = $titreArticleEn;
        $this->varPage['imgArticle'] = $imgArticle;
        $this->varPage['contenuArticleFr'] = $contenuArticleFr;
        $this->varPage['contenuArticleEn'] = $contenuArticleEn;
        
        return view('page.admin.createArticle')->with($this->varPage);
    }
    
    private function afficheCreateRealisateur($erreur='', $confirm='', $nomRealisateur = '', $imgRealisateur = '', $presentationFr='', $presentationEn='') {
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['newRealisateurUrl'] = route('admin_createRealisateur');
        $this->varPage['nomRealisateur'] = $nomRealisateur;
        $this->varPage['imgRealisateur'] = $imgRealisateur;
        $this->varPage['presentationFr'] = $presentationFr;
        $this->varPage['presentationEn'] = $presentationEn;
        
        return view('page.admin.createRealisateur')->with($this->varPage);
    }
    
    private function afficheCreateSeance($erreur='', $confirm='', $filmParSeances=array(), $dateSeance='', $lieuSeance='', $dureeSeance='', $nomSeanceFr='', $nomSeanceEn='') {
        $this->setPath();
        
        $lieuSeances = LieuSeance::orderby('adminNomLieuSeance')->get();
        $films = Film::get();

        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['modifSeanceUrl'] = route('admin_createSeance');

        $this->varPage['lieuSeances'] = $lieuSeances;
        $this->varPage['lieuSeance'] = $lieuSeance;
        $this->varPage['films'] = $films;
        $this->varPage['filmParSeances'] = $filmParSeances;
        $this->varPage['lieuSeance'] = $lieuSeance;
        $this->varPage['dureeSeance'] = $dureeSeance;
        $this->varPage['nomSeanceFr'] = $nomSeanceFr;
        $this->varPage['nomSeanceEn'] = $nomSeanceEn;
        $this->varPage['dateSeance'] = $dateSeance;

        return view('page.admin.createSeance')->with($this->varPage);
    }
    
    private function afficheCreateFilm($erreur='', $confirm='', $tabValue) {
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['newFilmUrl'] = route('admin_createFilm');
        $array = array();
        $this->varPage['imgFilm'] = (isset($tabValue['imgFilm']) ? $tabValue['imgFilm'] : "");
        $this->varPage['titreFilmFr'] = (isset($tabValue['titreFilmFr']) ? $tabValue['titreFilmFr'] : "");
        $this->varPage['titreFilmEn'] = (isset($tabValue['titreFilmEn']) ? $tabValue['titreFilmEn'] : "");
        $this->varPage['lienVideoFilmFr'] = (isset($tabValue['lienVideoFilmFr']) ? $tabValue['lienVideoFilmFr'] : "");
        $this->varPage['lienVideoFilmEn'] = (isset($tabValue['lienVideoFilmEn']) ? $tabValue['lienVideoFilmEn'] : "");
        $this->varPage['idRealisateurFilm'] = (isset($tabValue['idRealisateurFilm']) ? $tabValue['idRealisateurFilm'] : "");
        $this->varPage['anneeProductionFilm'] = (isset($tabValue['anneeProductionFilm']) ? $tabValue['anneeProductionFilm'] : "");
        $this->varPage['interdictionAgeFilm'] = (isset($tabValue['interdictionAgeFilm']) ? $tabValue['interdictionAgeFilm'] : "");
        $this->varPage['metrageFilm'] = (isset($tabValue['metrageFilm']) ? $tabValue['metrageFilm'] : "");
        $this->varPage['dureeMinuteFilm'] = (isset($tabValue['dureeMinuteFilm']) ? $tabValue['dureeMinuteFilm'] : "");
        $this->varPage['boiteProductionFilm'] = (isset($tabValue['boiteProductionFilm']) ? $tabValue['boiteProductionFilm'] : "");
        $this->varPage['tabGenreFilm'] = (isset($tabValue['tabGenreFilm']) ? $tabValue['tabGenreFilm'] : $array);
        $this->varPage['tabPaysFilm'] = (isset($tabValue['tabPaysFilm']) ? $tabValue['tabPaysFilm'] : $array);
        $this->varPage['resumeFilmFr'] = (isset($tabValue['resumeFilmFr']) ? $tabValue['resumeFilmFr'] : "");
        $this->varPage['resumeFilmEn'] = (isset($tabValue['resumeFilmEn']) ? $tabValue['resumeFilmEn'] : "");
        
        $this->varPage['realisateurs'] = Realisateur::orderby('nomRealisateur')->get();
        
        $this->varPage['genres'] = GenreFilm::with(['traductions' => function ($query) {
            $query->where('initialLangue', 'fr')->orderby('nomGenreFilm');
        }])->get();
        
        $this->varPage['pays'] = Pays::with(['traductions' => function ($query) {
            $query->where('initialLangue', 'fr')->orderby('nomPays');
        }])->get();
        
        $this->varPage['metrages'] = Metrage::with(['traductions' => function ($query) {
            $query->where('initialLangue', 'fr')->orderby('nomMetrage');
        }])->get();
        
        
        return view('page.admin.createFilm')->with($this->varPage);
    }
    
    private function afficheModifFilm($erreur='', $confirm='', $idFilm, $tabValue) {
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['newFilmUrl'] = route('admin_modifFilm', ['idFilm'=>$idFilm]);
        $array = array();
        $this->varPage['imgFilm'] = (isset($tabValue['imgFilm']) ? $tabValue['imgFilm'] : "");
        $this->varPage['titreFilmFr'] = (isset($tabValue['titreFilmFr']) ? $tabValue['titreFilmFr'] : "");
        $this->varPage['titreFilmEn'] = (isset($tabValue['titreFilmEn']) ? $tabValue['titreFilmEn'] : "");
        $this->varPage['lienVideoFilmFr'] = (isset($tabValue['lienVideoFilmFr']) ? $tabValue['lienVideoFilmFr'] : "");
        $this->varPage['lienVideoFilmEn'] = (isset($tabValue['lienVideoFilmEn']) ? $tabValue['lienVideoFilmEn'] : "");
        $this->varPage['idRealisateurFilm'] = (isset($tabValue['idRealisateurFilm']) ? $tabValue['idRealisateurFilm'] : "");
        $this->varPage['anneeProductionFilm'] = (isset($tabValue['anneeProductionFilm']) ? $tabValue['anneeProductionFilm'] : "");
        $this->varPage['interdictionAgeFilm'] = (isset($tabValue['interdictionAgeFilm']) ? $tabValue['interdictionAgeFilm'] : "");
        $this->varPage['metrageFilm'] = (isset($tabValue['metrageFilm']) ? $tabValue['metrageFilm'] : "");
        $this->varPage['dureeMinuteFilm'] = (isset($tabValue['dureeMinuteFilm']) ? $tabValue['dureeMinuteFilm'] : "");
        $this->varPage['boiteProductionFilm'] = (isset($tabValue['boiteProductionFilm']) ? $tabValue['boiteProductionFilm'] : "");
        $this->varPage['tabGenreFilm'] = (isset($tabValue['tabGenreFilm']) ? $tabValue['tabGenreFilm'] : $array);
        $this->varPage['tabPaysFilm'] = (isset($tabValue['tabPaysFilm']) ? $tabValue['tabPaysFilm'] : $array);
        $this->varPage['resumeFilmFr'] = (isset($tabValue['resumeFilmFr']) ? $tabValue['resumeFilmFr'] : "");
        $this->varPage['resumeFilmEn'] = (isset($tabValue['resumeFilmEn']) ? $tabValue['resumeFilmEn'] : "");
        
        $this->varPage['realisateurs'] = Realisateur::orderby('nomRealisateur')->get();
        
        $this->varPage['genres'] = GenreFilm::with(['traductions' => function ($query) {
            $query->where('initialLangue', 'fr')->orderby('nomGenreFilm');
        }])->get();
        
        $this->varPage['pays'] = Pays::with(['traductions' => function ($query) {
            $query->where('initialLangue', 'fr')->orderby('nomPays');
        }])->get();
        
        $this->varPage['metrages'] = Metrage::with(['traductions' => function ($query) {
            $query->where('initialLangue', 'fr')->orderby('nomMetrage');
        }])->get();
        
        
        return view('page.admin.modifFilm')->with($this->varPage);
    }
    
    private function afficheModifArticle($erreur='', $confirm='', $idArticle = '', $typeArticle = '', $titreArticleFr = '', $titreArticleEn = '', $imgArticle='', $categorieArticle='', $contenuArticleFr='', $contenuArticleEn='') {
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        switch($typeArticle) {
            case "Evenement 2015" : 
                $this->varPage['modifArticleUrl'] = route('admin_modifEvenement2015', ['idArticle' => $idArticle]);
                break;
            case "News" : 
                $this->varPage['modifArticleUrl'] = route('admin_modifNews', ['idArticle' => $idArticle]);
                break;
        }
        
        $this->varPage['typeArticle'] = $typeArticle;
        $this->varPage['titreArticleFr'] = $titreArticleFr;
        $this->varPage['titreArticleEn'] = $titreArticleEn;
        $this->varPage['imgArticle'] = $imgArticle;
        $this->varPage['categorieArticle'] = $categorieArticle;
        $this->varPage['contenuArticleFr'] = $contenuArticleFr;
        $this->varPage['contenuArticleEn'] = $contenuArticleEn;
        
        return view('page.admin.ModifArticle')->with($this->varPage);
    }
    
    private function afficheModifRealisateur($erreur='', $confirm='', $idRealisateur='', $nomRealisateur = '', $imgRealisateur = '', $presentationFr='', $presentationEn='') {
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['modifRealisateurUrl'] = route('admin_modifRealisateur', ['idRealisateur'=>$idRealisateur]);
        $this->varPage['nomRealisateur'] = $nomRealisateur;
        $this->varPage['imgRealisateur'] = $imgRealisateur;
        $this->varPage['presentationFr'] = $presentationFr;
        $this->varPage['presentationEn'] = $presentationEn;
        
        return view('page.admin.modifRealisateur')->with($this->varPage);
    }
    
    private function afficheModifSeance($idSeance, $erreur='', $confirm='', $lieuSeances='', $films='', $filmParSeances='', $dateSeance='', $nomLieuSeance='', $lieuSeance='', $dureeSeance='', $nomSeanceFr='', $nomSeanceEn=''){
        $this->setPath();
        
        $this->varPage['erreur'] = $erreur;
        $this->varPage['confirm'] = $confirm;
        $this->varPage['modifSeanceUrl'] = route('admin_modifSeance', ['idSeance'=>$idSeance]);

        $this->varPage['lieuSeances'] = $lieuSeances;
        $this->varPage['lieuSeance'] = $lieuSeance;
        $this->varPage['films'] = $films;
        $this->varPage['filmParSeances'] = $filmParSeances;
        $this->varPage['nomLieuSeance'] = $nomLieuSeance;
        $this->varPage['lieuSeance'] = $lieuSeance;
        $this->varPage['dureeSeance'] = $dureeSeance;
        $this->varPage['nomSeanceFr'] = $nomSeanceFr;
        $this->varPage['nomSeanceEn'] = $nomSeanceEn;
        $this->varPage['dateSeance'] = $dateSeance;
        
        return view('page.admin.modifSeance')->with($this->varPage);
    }
    
    public function login(Request $request) {
        $this->setPath();
        
        if (Session::get('connected')) {
            return $this->afficheHomePage($this->varPage);
        }
        
        if ($request->exists('login') && $request->get('login') == 'admin' && $request->get('password') == 'admin') {
                // connection
                Session::put('connected', true);
                Session::put('time', time());
                
                // affiche HomePage
                return $this->afficheHomePage();
        }
        
        if ($request->exists('login')) {
            return $this->afficheLoginPage("Mot de passe incorrect");
        } else {
            return $this->afficheLoginPage("");
        }
    }
    
    public function allRealisateur(){
        $this->setPath();
        
        return $this->afficheAllRealisateur('', '');
    }
    
    public function allEvenement2015(){
        $this->setPath();
        
        return $this->afficheAllArticle("Evenement 2015");
    }
    
    public function allNews(){
        $this->setPath();
        
        return $this->afficheAllArticle("News");
    }
    
    public function allFilm(){
        $this->setPath();
        
        return $this->afficheAllFilm('', '');
    }
    
    public function allSeance(){
        $this->setPath();
        
        return $this->afficheAllSeance();
    }
    
    public function deleteRealisateur($idRealisateur){
        $this->setPath();
        $realisateur = Realisateur::where('idRealisateur', $idRealisateur)->first();
        if ($realisateur == null) {
            return $this->afficheAllRealisateur('Le realisateur que vous essayez de supprimer n\'existe pas');
        } else {
            if ($realisateur->films()->count() > 0) {
                return $this->afficheAllRealisateur('Le realisateur que vous essayez de supprimer est encore relié a un ou plusieurs films. Il n\'a pas été surrpimé');
            } else {
                $nom = $realisateur->nomRealisateur;
                $image = $this->modifImageName($realisateur->urlImageRealisateur);
                DB::transaction(function() use ($realisateur, $nom, $image) {
                    $nbImage = Realisateur::where('urlImageRealisateur', $image)->count();
                    
                    $trads = $realisateur->traductions()->get();
                    foreach ($trads as $trad){
                        $query = 'delete from RealisateurTraduction where idRealisateur = '.$trad->idRealisateur.' and initialLangue=\''.$trad->initialLangue.'\'';
                        DB::delete($query);
                    }

                    $realisateur->delete();
                    
                    if ($nbImage == 1) {
                        $this->deleteImage($image);
                    }
                });
                return $this->afficheAllRealisateur('', 'Le realisateur "'.$nom.'" a bien été supprimé');
            }
        }
        return $this->afficheAllRealisateur('', '');
    }
    
    public function deleteSeance($idSeance){
        $this->setPath();
        $seance = Seance::where('idSeance', $idSeance)->first();
        if ($seance == null) {
            return $this->afficheAllSeance('La séance que vous essayez de supprimer n\'existe pas');
        } else {
            
            $nom = $seance->traductions()->where('initialLangue', 'fr')->first()->nomSeance;
            DB::transaction(function() use ($idSeance, $seance) {
                $query = 'delete from SeanceTraduction where idSeance = '.$idSeance;
                DB::delete($query);
                
                $query = 'delete from FilmParSeance where idSeance = '.$idSeance;
                DB::delete($query);
                
                $seance->delete();
            });
            return $this->afficheAllSeance('', 'La seance "'.$nom.'" a bien été supprimée');
            
        }
        return $this->afficheAllSeance('', '');
    }
    
    public function deleteFilm($idFilm){
        $this->setPath();
        $film = Film::where('idFilm', $idFilm)->first();
        if ($film == null) {
            return $this->afficheAllFilm('Le film que vous essayez de supprimer n\'existe pas');
        } else {
            if ($film->filmParSeances()->count() > 0) {
                return $this->afficheAllFilm('Le film que vous essayez de supprimer est encore relié a une ou plusieurs séances. Il n\'a pas été surrpimé');
            } else {
                $titreFilm = $film->traductions()->where('initialLangue', 'fr')->first()->nomFilm;
                $image = $this->modifImageName($film->urlImageFilm);
                DB::transaction(function() use ($film, $image, $idFilm) {
                    $nbImage = Film::where('urlImageFilm', $image)->count();
                    
                    $query = 'delete from PaysFilm where idFilm = '.$idFilm;
                    DB::delete($query);
                    
                    $query = 'delete from GenreFilmDuFilm where idFilm = '.$idFilm;
                    DB::delete($query);
                    
                    $query = 'delete from FilmTraduction where idFilm = '.$idFilm;
                    DB::delete($query);
                    
                    $film->delete();
                    
                    if ($nbImage == 1) {
                        $this->deleteImage($image);
                    }
                });
                return $this->afficheAllFilm('', 'Le film "'.$titreFilm.'" a bien été supprimé');
            }
        }
        return $this->afficheAllFilm('', '');
    }
    
    public function deleteEvenement2015($idArticle){
        return $this->deleteArticle($idArticle, "Evenement 2015");
    }
    
    public function deleteNews($idArticle){
        return $this->deleteArticle($idArticle, "News");
    }
    
    private function deleteArticle($idArticle, $typeArticle){
        $this->setPath();
        $article = Article::where([['idArticle', '=', $idArticle], ['nomCategorieArticle', '=', $typeArticle]])->first();
        if ($article == null) {
            $err = "";
            switch($typeArticle) {
                case "Evenement 2015" : 
                    $err = "L'évènement 2015 que vous essayez de supprimer n\'existe pas";
                    break;
                case "News" : 
                    $err = "La news que vous essayez de supprimer n\'existe pas";
                    break;
            }
            return $this->afficheAllArticle($typeArticle, $err);
        } else {
            $titreArticleFr = $article->traductions()->where('initialLangue', 'fr')->first()->titreArticle;
            $image = $this->modifImageName($article->urlImageArticle);
            DB::transaction(function() use ($article, $typeArticle, $image) {
                $nbImage = Article::where('urlImageArticle', $image)->count();
                $ordreArticle = $article->ordreArticle;
                
                $trads = $article->traductions()->get();
                foreach ($trads as $trad){
                    $query = 'delete from ArticleTraduction where idArticle = '.$trad->idArticle.' and initialLangue=\''.$trad->initialLangue.'\'';
                    DB::delete($query);
                }

                $article->delete();
                
                $articlesToMove = Article::where([
                    ['nomCategorieArticle', '=', $typeArticle], 
                    ['ordreArticle', '>', $ordreArticle]])
                        ->orderby('ordreArticle', 'ASC')->get();
                foreach($articlesToMove as $tmpArticle) {
                    $tmpArticle->ordreArticle = $tmpArticle->ordreArticle-1;
                    $tmpArticle->update();
                }
                
                if ($nbImage == 1) {
                    $this->deleteImage($image);
                }
            });
            
            $msg = "";
            switch($typeArticle) {
                case "Evenement 2015" : 
                    $msg = "L'évènement 2015 \'".$titreArticleFr."\' a bien été supprimé";
                    break;
                case "News" : 
                    $msg = "La news '".$titreArticleFr."' a bien été supprimée";
                    break;
            }
            return $this->afficheAllArticle($typeArticle,'', $msg);
            
        }
        return $this->afficheAllArticle($typeArticle,'', '');
    }
    
    private function checkInputArticle($typeArticle, $image, $titreArticleFr, $titreArticleEn, $contenuArticleFr, $contenuArticleEn) {
        $type = "";
        $erreur = "";
        
        switch ($typeArticle) {
            case "Evenement 2015" : $type = "l'evenement 2015"; break;
            case "News" : $type = "la news"; break;
        }

        if (strlen($titreArticleFr) < 5) {
            $erreur .= "Le titre francais de ". $type ." doit faire plus de 5 carractères. '".$titreArticleFr."' n'en fait que ".strlen($titreArticleFr).".<br>";
        }
        
        if (strlen($titreArticleEn) < 5) {
            $erreur .= "Le titre anglais de ". $type ." doit faire plus de 5 carractères. '".$titreArticleEn."' n'en fait que ".strlen($titreArticleEn).".<br>";
        }

        if (strlen($image) < 5) {
            $erreur .= ucfirst($type) . " doit avoir une image.<br>";
        }

        if (strlen($contenuArticleFr) < 5) {
            $erreur .="Le contenu francais de ". $type ." doit être rempli.<br>";
        }

        if (strlen($contenuArticleEn) < 5) {
            $erreur .="Le contenu anglais de ". $type ." doit être rempli.<br>";
        }
        
        return $erreur;
    }
    
    private function checkInputRealisateur($nom, $presentationFr, $presentationEn, $image) {
        $erreur = "";
        if (strlen($nom) < 5) {
            $erreur .="Le nom du réalisateur doit faire plus de 5 carractères. '".$nom."' n'en fait que ".strlen($nom).".<br>";
        }

        if (strlen($image) < 5) {
            $erreur .="Le réalisateur doit avoir une image.<br>";
        }

        if (strlen($presentationFr) < 5) {
            $erreur .="Le réalisateur doit avoir un texte de presentation en francais.<br>";
        }

        if (strlen($presentationEn) < 5) {
            $erreur .="Le réalisateur doit avoir un texte de presentation en anglais.<br>";
        }
        
        return $erreur;
    }
    
    private function checkInputSeance($dureeSeance, $nomSeanceFr, $nomSeanceEn, $film) {
        $erreur = "";
        
        if (!is_numeric($dureeSeance)) {
            $erreur .="La duree de la séance doit être un valeur numérique.<br>";
        } else {
            $tmp = intval($dureeSeance);
            if ($tmp == 0) {
                $erreur .="La duree de la séance doit être suppérieur à 0.<br>";
            }
        }

        if (strlen($nomSeanceFr) < 5) {
            $erreur .="Le nom francais de la séance doit faire plus de 5 carractère.<br>";
        }

        if (strlen($nomSeanceEn) < 5) {
            $erreur .="Le nom anglais de la séance doit faire plus de 5 carractère.<br>";
        }
        
        if (count($film) == 0) {
            $erreur .="La séance doit comporter au moins un film.<br>";
        }
        
        if (count($film) != count(array_unique($film))) {
            $erreur .="La séance ne peut pas avoir 2 fois le même film.<br>";
        }
        
        return $erreur;
    }
    
    
    
    private function checkInputFilm($tabValue) {
        $erreur = "";
        if (strlen($tabValue['imgFilm']) < 5) {
            $erreur .="Le film doit avoir une image.<br>";
        }

        if (strlen($tabValue['titreFilmFr']) < 1) {
            $erreur .="Le film doit avoir un titre en francais.<br>";
        }

        if (strlen($tabValue['titreFilmEn']) < 1) {
            $erreur .="Le film doit avoir un titre en anglais.<br>";
        }

        if (strlen($tabValue['idRealisateurFilm']) == 0) {
            $erreur .="Le film du film doit être renseigné.<br>";
        }

        if (strlen($tabValue['anneeProductionFilm']) != 4) {
            $erreur .="L'année de production doit être sur 4 positions.<br>";
        }

        if (!is_numeric($tabValue['anneeProductionFilm'])) {
            $erreur .="L'année de production du film doit être un nombre.<br>";
        }

        if (strlen($tabValue['dureeMinuteFilm']) > 0 && !is_numeric($tabValue['dureeMinuteFilm'])) {
            $erreur .="La durée du film doit être un nombre.<br>";
        }

        if (strlen($tabValue['metrageFilm']) == 0) {
            $erreur .="Le metrage du film doit être renseignée.<br>";
        }

        if (count($tabValue['tabPaysFilm']) == 0) {
            $erreur .="Au moins un pays d'origine du film doit être renseigné.<br>";
        }

        if (count($tabValue['tabGenreFilm']) == 0) {
            $erreur .="Au moins un genre de film doit être renseigné.<br>";
        }

        if (strlen($tabValue['resumeFilmFr']) < 5) {
            $erreur .="Le film doit avoir un synopsis en francais.<br>";
        }

        if (strlen($tabValue['resumeFilmEn']) < 5) {
            $erreur .="Le film doit avoir un synopsis en anglais.<br>";
        }
        
        return $erreur;
    }
    
    public function modifRealisateur($idRealisateur, Request $request=null) {
        $this->setPath();
        $realisateur = Realisateur::where('idRealisateur', $idRealisateur)->first();
        
        if ($request->get('imgRealisateur')==null) {
            if ($realisateur == null) {
                return $this->afficheAllRealisateur('Le réalisateur que vous essayez de modifier n\'existe pas');
            } else {
                $tradFr = $realisateur->traductions()->where('initialLangue', 'fr')->first();
                $tradEn = $realisateur->traductions()->where('initialLangue', 'en')->first();
                $presentationFr = $tradFr->presentationRealisateur;
                $presentationEn = $tradEn->presentationRealisateur;
                $nomRealisateur = $realisateur->nomRealisateur;
                $img = $realisateur->urlImageRealisateur;
                
                return $this->afficheModifRealisateur('', '', $idRealisateur, $nomRealisateur, $img, $presentationFr, $presentationEn);
            }
        }else{
            $presentationFr = $this->getString($request->presentationFr);
            $presentationEn = $this->getString($request->presentationEn);
            $nomRealisateur = $this->getString($request->nomRealisateur);
            $image = $this->modifImageName($request->get('imgRealisateur'));
            
            $erreur = $this->checkInputRealisateur($nomRealisateur, $presentationFr, $presentationEn, $image);
            
            if ($erreur != '') {
                return $this->afficheModifRealisateur($erreur, '', $idRealisateur, $nomRealisateur, $image, $presentationFr, $presentationEn);
            } else {
                DB::transaction(function() use ($idRealisateur, $nomRealisateur, $image, $presentationFr, $presentationEn, $realisateur, $request) {
                    RealisateurTraduction::where([['idRealisateur', '=', $idRealisateur], ['initialLangue', '=', 'fr']])
                            ->update(array('presentationRealisateur' => $presentationFr));

                    RealisateurTraduction::where([['idRealisateur', '=', $idRealisateur], ['initialLangue', '=', 'en']])
                            ->update(array('presentationRealisateur' => $presentationEn));

                    Realisateur::where('idRealisateur', $idRealisateur)
                            ->update(array('nomRealisateur'=>$nomRealisateur, 'urlImageRealisateur'=>$image));
                });
                return $this->afficheAllRealisateur('','Le réalisateur "'. $nomRealisateur .'" a bien été modifié');
            }
        }
    }
    
    private function getAllTraduction() {
        $tmps = ClePage::orderby('nomPage', 'ASC')->orderby('nomClePage', 'ASC')->with('traductions')->get();
        
        $traductions = array();
        $i = 0;
        foreach ($tmps as $tmp) {
            $trad = array();
            $trad['id'] = $tmp->idClePage;
            $trad['nomPage'] = $tmp->nomPage;
            $trad['nomClePage'] = $tmp->nomClePage;
            $trad['fr'] = $tmp->traductions()->where('initialLangue', 'fr')->first()->textPage;
            $trad['en'] = $tmp->traductions()->where('initialLangue', 'en')->first()->textPage;
            $traductions[$i] = $trad;
            $i++;
        }
        return $traductions;
    }
    
    private function recupAllTraduction(Request $request) {
        $tmps = ClePage::orderby('nomPage', 'ASC')->orderby('nomClePage', 'ASC')->with('traductions')->get();
        
        $traductions = array();
        $i = 0;
        foreach ($tmps as $tmp) {
            $trad = array();
            $trad['id'] = $tmp->idClePage;
            $trad['nomPage'] = $tmp->nomPage;
            $trad['nomClePage'] = $tmp->nomClePage;
            $trad['fr'] = $this->getString($request->get("".$trad['nomPage']."_".$trad['nomClePage']."_fr"));
            $trad['en'] = $this->getString($request->get("".$trad['nomPage']."_".$trad['nomClePage']."_en"));
            $traductions[$i] = $trad;
            $i++;
        }
        return $traductions;
    }
    private function recupAllErreurTraduction($traductions) {
        $erreur = "";
        foreach ($traductions as $trad) {
            if (strlen($trad['fr']) == 0) {
                $erreur .= "'".$trad['nomPage']."_".$trad['nomClePage']."_fr' ne peut pas être vide.<br>";
            }
            if (strlen($trad['en']) == 0) {
                $erreur .= "'".$trad['nomPage']."_".$trad['nomClePage']."_en' ne peut pas être vide.<br>";
            }
        }
        return $erreur;
    }
    
    public function modifTraduction(Request $request=null) {
        
        $this->setPath();
        
        if ($request->get('Common_lundi_fr')==null) {
            return $this->afficheModifTraduction($this->getAllTraduction(), '', '');
        }else{
            $trads = $this->recupAllTraduction($request);
            $erreur = $this->recupAllErreurTraduction($trads);
            
            if ($erreur != '') {
                return $this->afficheModifTraduction($trads, $erreur, '');
            } else {
                DB::transaction(function() use ($trads) {
                    foreach($trads as $trad) {
                        PageTextTraduction::where([['idClePage','=', $trad['id']],['initialLangue','=', 'fr']])
                                ->update(array('textPage'=>$trad['fr']));
                        
                        PageTextTraduction::where([['idClePage','=', $trad['id']],['initialLangue','=', 'en']])
                                ->update(array('textPage'=>$trad['en']));
                    }
                });
                return $this->afficheModifTraduction($this->getAllTraduction(),'','Toutes les traductions ont bien été modifiées');
            }
        }
    }
    
    public function modifSeance($idSeance, Request $request=null) {
        $this->setPath();
        $seance = Seance::where('idSeance', $idSeance)->first();
        
        if ($request->get('lieuSeance')==null) {
            if ($seance == null) {
                return $this->afficheAllSeance('La séance que vous essayez de modifier n\'existe pas');
            } else {
                $lieuSeances = LieuSeance::orderby('adminNomLieuSeance')->get();
                $films = Film::get();
                
                $tmpFilmParSeances = FilmParSeance::where('idSeance', $seance->idSeance)->orderby('ordreFilm')->get();
                $filmParSeances = array();
                $i=0;
                foreach($tmpFilmParSeances as $tmp){
                    $filmParSeances[$i] = $tmp->idFilm;
                    $i++;
                }
                
                $dateSeance = $seance->dateTimeSeance;
                $nomLieuSeance = $seance->lieuSeance()->first()->traductions()->where('initialLangue', 'fr')->first()->nomLieuSeance;
                $lieuSeance = $seance->lieuSeance()->first()->adminNomLieuSeance;
                $dureeSeance = $seance->dureeMinuteSeance;
                $nomSeanceFr = $seance->traductions()->where('initialLangue', 'fr')->first()->nomSeance;
                $nomSeanceEn = $seance->traductions()->where('initialLangue', 'en')->first()->nomSeance;
                
                return $this->afficheModifSeance($idSeance, '', '', $lieuSeances, $films, $filmParSeances, $dateSeance, $nomLieuSeance, $lieuSeance, $dureeSeance, $nomSeanceFr, $nomSeanceEn);
            }
        }else{
            $dateSeance = $this->getString($request->dateSeance);
            $heureSeance = $this->getString($request->heureSeance);
            $minuteSeance = $this->getString($request->minuteSeance);
            $dateSeance = $dateSeance." ".$heureSeance.":".$minuteSeance;
            $lieuSeance = $this->getString($request->lieuSeance);
            $dureeSeance = $this->getString($request->dureeSeance);
            $nomSeanceFr = $this->getString($request->nomSeanceFr);
            $nomSeanceEn = $this->getString($request->nomSeanceEn);
            $film = ($request->film == null ? array(): $request->film);
            $erreur = $this->checkInputSeance($dureeSeance, $nomSeanceFr, $nomSeanceEn, $film);
            
            if ($erreur != '') {
                $lieuSeances = LieuSeance::orderby('adminNomLieuSeance')->get();
                $films = Film::get();
                
                $filmParSeances=$film;
                 
                $nomLieuSeance = $seance->lieuSeance()->first()->traductions()->where('initialLangue', 'fr')->first()->nomLieuSeance;
                $lieuSeance = $seance->lieuSeance()->first()->adminNomLieuSeance;
                $dureeSeance = $seance->dureeMinuteSeance;
                $nomSeanceFr = $seance->traductions()->where('initialLangue', 'fr')->first()->nomSeance;
                $nomSeanceEn = $seance->traductions()->where('initialLangue', 'en')->first()->nomSeance;
                
                
                return $this->afficheModifSeance($idSeance, $erreur, '', $lieuSeances, $films, $filmParSeances, $dateSeance, $nomLieuSeance, $lieuSeance, $dureeSeance, $nomSeanceFr, $nomSeanceEn);
                
            } else {
                DB::transaction(function() use ($idSeance, $film, $nomSeanceFr, $nomSeanceEn, $dureeSeance, $lieuSeance, $dateSeance) {
                    
                    
                    $query = 'delete from FilmParSeance where idSeance = '.$idSeance;
                    DB::delete($query);
                    $i=1;
                    foreach ($film as $idFilm) {
                        $filmParSeance = new FilmParSeance();
                        $filmParSeance->idFilm = $idFilm;
                        $filmParSeance->idSeance = $idSeance;
                        $filmParSeance->ordreFilm = $i;
                        $filmParSeance->save();
                        $i++;
                    }
                    
                    SeanceTraduction::where([['idSeance', '=', $idSeance],['initialLangue', '=', 'fr']])
                            ->update(array('nomSeance'=>$nomSeanceFr));
                    
                    SeanceTraduction::where([['idSeance', '=', $idSeance],['initialLangue', '=', 'en']])
                            ->update(array('nomSeance'=>$nomSeanceEn));
                    
                    Seance::where('idSeance', $idSeance)
                            ->update(array(
                                'dureeMinuteSeance' => $dureeSeance,
                                'dateTimeSeance' => date_create_from_format('d-m-Y H:i', $dateSeance),
                                'adminNomLieuSeance' => $lieuSeance
                            ));
                            
                });
                return $this->afficheAllSeance('','La seance "'. $nomSeanceFr .'" du '. $dateSeance .' a bien été modifiée.');
            }
        }
    }
    
    public function modifFilm($idFilm, Request $request=null) {
        $this->setPath();
        $film = Film::where('idFilm', $idFilm)->first();
        
        if ($request->get('urlImageFilm')==null) {
            if ($film == null) {
                return $this->afficheAllFilm('Le film que vous essayez de modifier n\'existe pas');
            } else {
                $genreFilm = GenreFilmDuFilm::where('idFilm', $idFilm)->get();
                $paysFilm = PaysFilm::where('idFilm', $idFilm)->get();
                $tabGenreFilm = array();
                $tabPaysFilm = array();
                foreach ($genreFilm as $genre) {array_push($tabGenreFilm, $genre->idGenreFilm);}
                foreach ($paysFilm as $pays) {array_push($tabPaysFilm, $pays->initialPays);}
                $tradFr = $film->traductions()->where('initialLangue', 'fr')->first();
                $tradEn = $film->traductions()->where('initialLangue', 'en')->first();
                
                $tabValue['imgFilm'] = $film->urlImageFilm;
                $tabValue['titreFilmFr'] = $tradFr->nomFilm;
                $tabValue['titreFilmEn'] = $tradEn->nomFilm;
                $tabValue['lienVideoFilmFr'] = $tradFr->lienVideo;
                $tabValue['lienVideoFilmEn'] = $tradEn->lienVideo;
                $tabValue['idRealisateurFilm'] = $film->idRealisateur;
                $tabValue['anneeProductionFilm'] = $film->anneeProduction;
                $tabValue['interdictionAgeFilm'] = $film->interdictionAge;
                $tabValue['metrageFilm'] = $film->initialMetrage;
                $tabValue['dureeMinuteFilm'] = $film->dureeMinuteFilm;
                $tabValue['boiteProductionFilm'] = $film->boiteProduction;
                $tabValue['resumeFilmFr'] = $tradFr->resumeFilm;
                $tabValue['resumeFilmEn'] = $tradEn->resumeFilm;
                
                $tabValue['tabGenreFilm'] = $tabGenreFilm;
                $tabValue['tabPaysFilm'] = $tabPaysFilm;
                
                return $this->afficheModifFilm('', '', $idFilm, $tabValue);
            }
        }else{
            $tabValue = array();
            $tabValue['imgFilm'] = $this->modifImageName($request->urlImageFilm);
            $tabValue['titreFilmFr'] = $this->getString($request->titreFilmFr);
            $tabValue['titreFilmEn'] = $this->getString($request->titreFilmEn);
            $tabValue['lienVideoFilmFr'] = $this->getString($request->lienVideoFilmFr);
            $tabValue['lienVideoFilmEn'] = $this->getString($request->lienVideoFilmEn);
            $tabValue['idRealisateurFilm'] = $this->getString($request->idRealisateurFilm);
            $tabValue['anneeProductionFilm'] = $this->getString($request->anneeProductionFilm);
            $tabValue['interdictionAgeFilm'] = $this->getString($request->interdictionAgeFilm);
            $tabValue['metrageFilm'] = $this->getString($request->metrageFilm);
            $tabValue['dureeMinuteFilm'] =  intval($this->getString($request->dureeMinuteFilm));
            $tabValue['boiteProductionFilm'] = $this->getString($request->boiteProductionFilm);
            $tabValue['resumeFilmFr'] = $this->getString($request->resumeFilmFr);
            $tabValue['resumeFilmEn'] = $this->getString($request->resumeFilmEn);
            $tabValue['tabGenreFilm'] = $request->tabGenreFilm;
            $tabValue['tabPaysFilm'] = $request->tabPaysFilm;
            $erreur = $this->checkInputFilm($tabValue);
            
            if ($erreur != '') {
                return $this->afficheModifFilm($erreur, '', $idFilm, $tabValue);
            } else {
                DB::transaction(function() use ($tabValue, $idFilm) {
                    FilmTraduction::where([['idFilm', '=', $idFilm], ['initialLangue', '=', 'fr']])
                            ->update(array(
                                'lienVideo' => $tabValue['lienVideoFilmFr'],
                                'nomFilm' => $tabValue['titreFilmFr'],
                                'resumeFilm' => $tabValue['resumeFilmFr']));

                    FilmTraduction::where([['idFilm', '=', $idFilm], ['initialLangue', '=', 'en']])
                            ->update(array(
                                'lienVideo' => $tabValue['lienVideoFilmEn'],
                                'nomFilm' => $tabValue['titreFilmEn'],
                                'resumeFilm' => $tabValue['resumeFilmEn']));

                    Film::where('idFilm', $idFilm)
                            ->update(array( 
                                'urlImageFilm'=>$tabValue['imgFilm'],
                                'idRealisateur' =>$tabValue['idRealisateurFilm'],
                                'anneeProduction'=>$tabValue['anneeProductionFilm'],
                                'interdictionAge'=>$tabValue['interdictionAgeFilm'],
                                'initialMetrage'=>$tabValue['metrageFilm'],
                                'dureeMinuteFilm'=>intval($tabValue['dureeMinuteFilm']),
                                'boiteProduction'=>$tabValue['boiteProductionFilm']
                                ));
                    
                    $query = 'delete from GenreFilmDuFilm where idFilm = '.$idFilm;
                    DB::delete($query);
                    
                    $query = 'delete from PaysFilm where idFilm = '.$idFilm;
                    DB::delete($query);
                    
                    foreach ($tabValue['tabGenreFilm'] as $genre) {
                        $genreFilm = new GenreFilmDuFilm();
                        $genreFilm->idFilm = $idFilm;
                        $genreFilm->idGenreFilm = $genre;
                        $genreFilm->save();
                    }
                    
                    foreach ($tabValue['tabPaysFilm'] as $pays) {
                        $paysFilm = new PaysFilm();
                        $paysFilm->idFilm = $idFilm;
                        $paysFilm->initialPays = $pays;
                        $paysFilm->save();
                    }
                });
                return $this->afficheAllFilm('','Le film "'. $tabValue['titreFilmFr'] .'" a bien été modifié');
            }
        }
    }
    
    public function modifEvenement2015($idArticle, Request $request=null) {
        return $this->modifArticle($idArticle, "Evenement 2015", $request);
    }
    
    public function modifNews($idArticle, Request $request=null) {
        echo "modif news";
        return $this->modifArticle($idArticle, "News", $request);
    }
    
    private function modifArticle($idArticle, $typeArticle, Request $request=null) {
        $this->setPath();
        $article = Article::where([['idArticle', '=', $idArticle], ['nomCategorieArticle', '=', $typeArticle]])->first();
        
        if ($request->get('urlImageArticle')==null) {
            if ($article == null) {
                $err="";
                switch ($typeArticle) {
                    case "Evenement 2015" : $err = "L'evenement 2015 "; break;
                    case "News" : $err = "L'article de news "; break;
                }
                return $this->afficheAllArticle($typeArticle, $err . 'que vous essayez de modifier n\'existe pas');
            } else {
                $tradFr = $article->traductions()->where('initialLangue', 'fr')->first();
                $tradEn = $article->traductions()->where('initialLangue', 'en')->first();
                $titreFr = $tradFr->titreArticle;
                $titreEn = $tradEn->titreArticle;
                $contenuFr = $tradFr->contenuArticle;
                $contenuEn = $tradEn->contenuArticle;
                $img = $article->urlImageArticle;
                
                return $this->afficheModifArticle('', '', $idArticle, $typeArticle, $titreFr, $titreEn, $img, $typeArticle, $contenuFr, $contenuEn);
            }
        }else{
            $titreArticleFr = $this->getString($request->titreArticleFr);
            $titreArticleEn = $this->getString($request->titreArticleEn);
            $contenuArticleFr = $this->getString($request->contenuArticleFr);
            $contenuArticleEn = $this->getString($request->contenuArticleEn);
            $image = $this->modifImageName($request->urlImageArticle);
            
            $erreur = $this->checkInputArticle($typeArticle, $image, $titreArticleFr, $titreArticleEn, $contenuArticleFr, $contenuArticleEn);
            
            if ($erreur != '') {
                return $this->afficheModifArticle($erreur, '', $idArticle, $typeArticle, $titreArticleFr, $titreArticleEn, $image, $typeArticle, $contenuArticleFr, $contenuArticleEn);
            } else {
                DB::transaction(function() use ($image, $idArticle, $titreArticleFr, $titreArticleEn, $image, $contenuArticleFr, $contenuArticleEn, $request) {
                    ArticleTraduction::where([['idArticle', '=', $idArticle], ['initialLangue', '=', 'fr']])
                            ->update(array('titreArticle' => $titreArticleFr));
                    
                    ArticleTraduction::where([['idArticle', '=', $idArticle], ['initialLangue', '=', 'en']])
                            ->update(array('titreArticle' => $titreArticleEn));

                    ArticleTraduction::where([['idArticle', '=', $idArticle], ['initialLangue', '=', 'fr']])
                            ->update(array('contenuArticle' => $contenuArticleFr));
                    
                    ArticleTraduction::where([['idArticle', '=', $idArticle], ['initialLangue', '=', 'en']])
                            ->update(array('contenuArticle' => $contenuArticleEn));

                    Article::where('idArticle', $idArticle)
                            ->update(array('urlImageArticle'=>$image));
                });
                $msg="";
                switch ($typeArticle) {
                    case "Evenement 2015" : $msg = "L'evenement 2015 ". "'". $titreArticleFr . "' a bien été modifié"; break;
                    case "News" : $msg = "La news ". "'". $titreArticleFr . "' a bien été modifié"; break;
                }
                return $this->afficheAllArticle($typeArticle, '', $msg);
            }
        }
    }
    
    public function createRealisateur(Request $request) {
        $this->setPath();
        
        if (!$request->exists('urlImageRealisateur')){
            return $this->afficheCreateRealisateur();
        } else {
            $presentationFr = $this->getString($request->presentationFr);
            $presentationEn = $this->getString($request->presentationEn);
            $nomRealisateur = $this->getString($request->nomRealisateur);
            $image = $this->modifImageName($request->urlImageRealisateur);
            
            $erreur = $this->checkInputRealisateur($nomRealisateur, $presentationFr, $presentationEn, $image);
            
            if ($erreur != '') {
                return $this->afficheCreateRealisateur($erreur, '', $nomRealisateur, $image, $presentationFr, $presentationEn);
            } else {
                DB::transaction(function() use ($nomRealisateur, $image, $presentationFr, $presentationEn) {
                    $realisateur = new Realisateur;
                    $realisateur->nomRealisateur = $nomRealisateur;
                    $realisateur->urlImageRealisateur = $image;
                    $realisateur->save();
                    $id=$realisateur->idRealisateur;

                    $tradFr = new RealisateurTraduction;
                    $tradFr->initialLangue = 'fr';
                    $tradFr->presentationRealisateur = $presentationFr;
                    $tradFr->idRealisateur = $id;
                    $tradFr->save();

                    $tradEn = new RealisateurTraduction;
                    $tradEn->initialLangue = 'en';
                    $tradEn->presentationRealisateur = $presentationEn;
                    $tradEn->idRealisateur = $id;
                    $tradEn->save();
                });
                return $this->afficheAllRealisateur('', 'Le réalisateur "'.$nomRealisateur.'" a bien été enregistré');
            }
        }
    }
    
    public function createSeance(Request $request) {
        $this->setPath();
        
        $filmParSeances = array();
        
        
        if (!$request->exists('lieuSeance')){
            return $this->afficheCreateSeance();
        } else {
            
            $dateSeance = $this->getString($request->dateSeance);
            $heureSeance = $this->getString($request->heureSeance);
            $minuteSeance = $this->getString($request->minuteSeance);
            $dateSeance = $dateSeance." ".$heureSeance.":".$minuteSeance;
            $lieuSeance = $this->getString($request->lieuSeance);
            $dureeSeance = $this->getString($request->dureeSeance);
            $nomSeanceFr = $this->getString($request->nomSeanceFr);
            $nomSeanceEn = $this->getString($request->nomSeanceEn);
            $filmParSeances = ($request->film == null ? array(): $request->film);

            $erreur = $this->checkInputSeance($dureeSeance, $nomSeanceFr, $nomSeanceEn, $filmParSeances);
            
            if ($erreur != '') {
                return $this->afficheCreateSeance($erreur, '', $filmParSeances, $dateSeance, $lieuSeance, $dureeSeance, $nomSeanceFr, $nomSeanceEn);
            } else {
                DB::transaction(function() use ($filmParSeances, $nomSeanceFr, $nomSeanceEn, $dureeSeance, $lieuSeance, $dateSeance) {
                    
                    $seance = new Seance();
                    $seance->dureeMinuteSeance = $dureeSeance;
                    
                    //dd(date("Y-m-d H:i"));
                    $date = date_create_from_format('d-m-Y H:i', $dateSeance);
                    $seance->dateTimeSeance = date_format($date, "Y-m-d H:i");
                    //dd($seance->dateTimeSeance);
                    $seance->adminNomLieuSeance = $lieuSeance;
                    $seance->save();
                    
                    $idSeance = $seance->idSeance;
                    
                    $trad = new SeanceTraduction();
                    $trad->initialLangue='fr';
                    $trad->idSeance = $idSeance;
                    $trad->nomSeance = $nomSeanceFr;
                    $trad->save();
                    
                    $trad = new SeanceTraduction();
                    $trad->initialLangue='en';
                    $trad->idSeance = $idSeance;
                    $trad->nomSeance = $nomSeanceEn;
                    $trad->save();
                    
                    $i=1;
                    foreach ($filmParSeances as $idFilm) {
                        $filmParSeance = new FilmParSeance();
                        $filmParSeance->idFilm = $idFilm;
                        $filmParSeance->idSeance = $idSeance;
                        $filmParSeance->ordreFilm = $i;
                        $filmParSeance->save();
                        $i++;
                    }
                    
                });
                return $this->afficheAllSeance('', 'La séance "'.$nomSeanceFr.'" a bien été enregistrée');
            }
        }
    }
    
    public function createFilm(Request $request) {
        $this->setPath();
        
        if (!$request->exists('urlImageFilm')){
            return $this->afficheCreateFilm('','',array());
        } else {
            $tabValue = array();
            $tabValue['imgFilm'] = $this->modifImageName($request->urlImageFilm);
            $tabValue['titreFilmFr'] = $this->getString($request->titreFilmFr);
            $tabValue['titreFilmEn'] = $this->getString($request->titreFilmEn);
            $tabValue['lienVideoFilmFr'] = $this->getString($request->lienVideoFilmFr);
            $tabValue['lienVideoFilmEn'] = $this->getString($request->lienVideoFilmEn);
            $tabValue['idRealisateurFilm'] = $this->getString($request->idRealisateurFilm);
            $tabValue['anneeProductionFilm'] = $this->getString($request->anneeProductionFilm);
            $tabValue['interdictionAgeFilm'] = $this->getString($request->interdictionAgeFilm);
            $tabValue['metrageFilm'] = $this->getString($request->metrageFilm);
            $tabValue['dureeMinuteFilm'] = intval($this->getString($request->dureeMinuteFilm));
            $tabValue['boiteProductionFilm'] = $this->getString($request->boiteProductionFilm);
            $tabValue['resumeFilmFr'] = $this->getString($request->resumeFilmFr);
            $tabValue['resumeFilmEn'] = $this->getString($request->resumeFilmEn);
            $tabValue['tabGenreFilm'] = $request->tabGenreFilm;
            $tabValue['tabPaysFilm'] = $request->tabPaysFilm;
            $erreur = $this->checkInputFilm($tabValue);
            
            if ($erreur != '') {
                return $this->afficheCreateFilm($erreur, '', $tabValue);
            } else {
                DB::transaction(function() use ($tabValue) {
                    $film = new Film;
                    $film->urlImageFilm = $tabValue['imgFilm'];
                    $film->idRealisateur = $tabValue['idRealisateurFilm'];
                    $film->anneeProduction = $tabValue['anneeProductionFilm'];
                    $film->interdictionAge = $tabValue['interdictionAgeFilm'];
                    $film->initialMetrage = $tabValue['metrageFilm'];
                    $film->dureeMinuteFilm = intval($tabValue['dureeMinuteFilm']);
                    $film->boiteProduction = $tabValue['boiteProductionFilm'];
                    $film->save();
                    $id=$film->idFilm;

                    $tradFr = new FilmTraduction;
                    $tradFr->idFilm = $id;
                    $tradFr->initialLangue = 'fr';
                    $tradFr->lienVideo = $tabValue['lienVideoFilmFr'];
                    $tradFr->nomFilm = $tabValue['titreFilmFr'];
                    $tradFr->resumeFilm = $tabValue['resumeFilmFr'];
                    $tradFr->save();

                    $tradEn = new FilmTraduction;
                    $tradEn->idFilm = $id;
                    $tradEn->initialLangue = 'en';
                    $tradEn->lienVideo = $tabValue['lienVideoFilmEn'];
                    $tradEn->nomFilm = $tabValue['titreFilmEn'];
                    $tradEn->resumeFilm = $tabValue['resumeFilmEn'];
                    $tradEn->save();

                    foreach($tabValue['tabGenreFilm'] as $genre) {
                        $genreFilmDuFilm = new GenreFilmDuFilm();
                        $genreFilmDuFilm->idFilm = $id;
                        $genreFilmDuFilm->idGenreFilm = $genre;
                        $genreFilmDuFilm->save();
                    }

                    foreach($tabValue['tabPaysFilm'] as $pays) {
                        $paysFilm = new PaysFilm();
                        $paysFilm->idFilm = $id;
                        $paysFilm->initialPays = $pays;
                        $paysFilm->save();
                    }
                });
                return $this->afficheAllFilm('', 'Le film "'.$tabValue['titreFilmFr'].'" a bien été enregistré');
            }
        }
    }
    
    public function createEvenement2015(Request $request) {
        return $this->createArticle($request, "Evenement 2015");
    }
    
    public function createNews(Request $request) {
        return $this->createArticle($request, "News");
    }
    
    public function createArticle(Request $request, $typeArticle) {
        $this->setPath();
        
        if (!$request->exists('urlImageArticle')){
            return $this->afficheCreateArticle($typeArticle);
        } else {
            
            $titreArticleFr = $this->getString($request->titreArticleFr);
            $titreArticleEn = $this->getString($request->titreArticleEn);
            $contenuArticleFr = $this->getString($request->contenuArticleFr);
            $contenuArticleEn = $this->getString($request->contenuArticleEn);
            $image = $this->modifImageName($request->urlImageArticle);
            
            $erreur = $this->checkInputArticle($typeArticle, $image, $titreArticleFr, $titreArticleEn, $contenuArticleFr, $contenuArticleEn);
            
            if ($erreur != '') {
                return $this->afficheCreateArticle($typeArticle, $erreur, '', $titreArticleFr, $titreArticleEn, $image, $contenuArticleFr, $contenuArticleEn);
            } else {
                DB::transaction(function() use ($image, $typeArticle, $titreArticleFr, $contenuArticleFr, $titreArticleEn, $contenuArticleEn) {
                
                    $articleToMove = Article::Where([
                        ['nomCategorieArticle', '=', $typeArticle]])
                        ->orderby('ordreArticle', 'DESC')->get();
                    
                    foreach($articleToMove as $tmpArticle) {
                        $tmpArticle->ordreArticle = $tmpArticle->ordreArticle+1;
                        $tmpArticle->update();
                    }
                    
                    $article = new Article;
                    $article->urlImageArticle = $image;
                    $article->nomCategorieArticle = $typeArticle;
                    $article->ordreArticle = 1;
                    $article->dateTimeArticle = date("Y-m-d H:i:s");
                    $article->save();
                    $id=$article->idArticle;

                    $tradFr = new ArticleTraduction;
                    $tradFr->initialLangue = 'fr';
                    $tradFr->titreArticle = $titreArticleFr;
                    $tradFr->contenuArticle = $contenuArticleFr;
                    $tradFr->idArticle = $id;
                    $tradFr->save();

                    $tradFr = new ArticleTraduction;
                    $tradFr->initialLangue = 'en';
                    $tradFr->titreArticle = $titreArticleEn;
                    $tradFr->contenuArticle = $contenuArticleEn;
                    $tradFr->idArticle = $id;
                    $tradFr->save();
                });
                
                $comment = "";
                switch ($typeArticle) {
                    case "Evenement 2015" : $comment = "L'evenement 2015 '".$titreArticleFr."' a bien été enregistré"; break;
                    case "News" : $comment = "L'article de news '".$titreArticleFr."' a bien été enregistré"; break;
                }
                return $this->afficheAllArticle($typeArticle,'', $comment);
            }
        }
    }
    
    public function disconnect() {
        $this->setPath();
        
        Session::put('connected', false); 
        Session::put('time', 0); 
        
        return $this->afficheLoginPage();
    }
    
}