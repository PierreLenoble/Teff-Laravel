<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// getAllLangue
$allLangue = array('fr', 'en');
$whereLangue = '';
foreach ($allLangue as $lg) {
    $whereLangue = $whereLangue . '|' . $lg ;
}
if (strlen($whereLangue) > 0) {
    $whereLangue = '(' . substr($whereLangue, 1) . ')';
}else{
    // route error langue
}

// FIRST
Route::get('/',     'CommonController@news')->name('racine');

// COMMON
Route::get('/{langue}/news',                                'CommonController@news')                    ->name('common_news')               ->where('langue',$whereLangue);
Route::get('/{langue}/news/page/{idPage}',                  'CommonController@pageNews')                ->name('common_pageNews')           ->where('langue',$whereLangue)  ->where('idPage','([0-9]+)');
Route::get('/{langue}/news/detail/{idNews}',                'CommonController@detailNews')              ->name('common_detailNews')         ->where('langue',$whereLangue)  ->where('idNews','([0-9]+)');
Route::get('/{langue}/archives',                            'CommonController@archives')                ->name('common_archives')           ->where('langue',$whereLangue);
Route::get('/{langue}/contact',                             'CommonController@contact')                 ->name('common_contact')            ->where('langue',$whereLangue);
Route::get('/{langue}/association',                         'CommonController@association')             ->name('common_association')        ->where('langue',$whereLangue);

// 2016
Route::get('/{langue}/2016/homePage',                       'Edition2016Controller@homePage')           ->name('2016_homePage')             ->where('langue',$whereLangue);
Route::get('/{langue}/2016/film/{idFilm}',                  'Edition2016Controller@detailsFilm')        ->name('2016_detailsFilm')          ->where('langue',$whereLangue)  ->where('idFilm','([0-9]+)');

// 2015
Route::get('/{langue}/2015/homePage',                       'Edition2015Controller@homePage')           ->name('2015_homePage')             ->where('langue',$whereLangue);
Route::get('/{langue}/2015/programme',                      'Edition2015Controller@programme')          ->name('2015_programme')            ->where('langue',$whereLangue);
Route::get('/{langue}/2015/seance/{idSeance}',              'Edition2015Controller@seance')             ->name('2015_seance')               ->where('langue',$whereLangue)  ->where('idSeance','([0-9]+)');
Route::get('/{langue}/2015/billeterie',                     'Edition2015Controller@billeterie')         ->name('2015_billeterie')           ->where('langue',$whereLangue);
Route::get('/{langue}/2015/films',                          'Edition2015Controller@films')              ->name('2015_films')                ->where('langue',$whereLangue);
Route::get('/{langue}/2015/film/{idFilm}',                  'Edition2015Controller@detailsfilm')        ->name('2015_detailsFilm')          ->where('langue',$whereLangue)  ->where('idFilm','([0-9]+)');
Route::get('/{langue}/2015/evenements',                     'Edition2015Controller@evenements')         ->name('2015_evenements')           ->where('langue',$whereLangue);
Route::get('/{langue}/2015/evenement/detail/{idEvenement}', 'Edition2015Controller@detailsEvenement')   ->name('2015_detailsEvenement')     ->where('langue',$whereLangue)  ->where('idEvenement','([0-9]+)');
Route::get('/{langue}/2015/partenaires',                    'Edition2015Controller@partenaires')        ->name('2015_partenaires')          ->where('langue',$whereLangue);
Route::get('/{langue}/2015/lieux',                          'Edition2015Controller@lieux')              ->name('2015_lieux')                ->where('langue',$whereLangue);
Route::get('/{langue}/2015/accessibilite',                  'Edition2015Controller@accessibilite')      ->name('2015_accessibilite')        ->where('langue',$whereLangue);

// admin

Route::get('admin',             'AdminController@login')        ->name('admin');
Route::any('admin/login',       'AdminController@login')        ->name('admin_login');
Route::get('admin/disconnect',  'AdminController@disconnect')   ->name('admin_disconnect');

Route::group(['prefix' => 'admin', 'middleware' => 'login'], function(){
    Route::get('/realisateur',                              'AdminController@allRealisateur')           ->name('admin_allRealisateur');
    Route::get('/evenement2015',                            'AdminController@allEvenement2015')         ->name('admin_allEvenement2015');
    Route::get('/news',                                     'AdminController@allNews')                  ->name('admin_allNews');
    Route::get('/film',                                     'AdminController@allFilm')                  ->name('admin_allFilm');
    Route::get('/seance',                                   'AdminController@allSeance')                ->name('admin_allSeance');
    
    Route::any('/realisateur/create',                       'AdminController@createRealisateur')        ->name('admin_createRealisateur');
    Route::any('/evenement2015/create',                     'AdminController@createEvenement2015')      ->name('admin_createEvenement2015');
    Route::any('/news/create',                              'AdminController@createNews')               ->name('admin_createNews');
    Route::any('/film/create',                              'AdminController@createFilm')               ->name('admin_createFilm');
    Route::any('/seance/create',                            'AdminController@createSeance')             ->name('admin_createSeance');
    
    Route::any('/realisateur/modif/{idRealisateur}',        'AdminController@modifRealisateur')         ->name('admin_modifRealisateur');
    Route::any('/evenement2015/modif/{idEvenement2015}',    'AdminController@modifEvenement2015')       ->name('admin_modifEvenement2015');
    Route::any('/news/modif/{idNews}',                      'AdminController@modifNews')                ->name('admin_modifNews');
    Route::any('/film/modif/{idFilm}',                      'AdminController@modifFilm')                ->name('admin_modifFilm');
    Route::any('/seance/modif/{idSeance}',                  'AdminController@modifSeance')              ->name('admin_modifSeance');
    Route::any('/traduction/modif',                         'AdminController@modifTraduction')          ->name('admin_modifTraduction');
    
    Route::any('/realisateur/delete/{idRealisateur}',       'AdminController@deleteRealisateur')        ->name('admin_deleteRealisateur');
    Route::any('/evenement2015/delete/{idEvenement2015}',   'AdminController@deleteEvenement2015')      ->name('admin_deleteEvenement2015');
    Route::any('/news/delete/{idNews}',                     'AdminController@deleteNews')               ->name('admin_deleteNews');
    Route::any('/film/delete/{idFilm}',                     'AdminController@deleteFilm')               ->name('admin_deleteFilm');
    Route::any('/seance/delete/{idSeance}',                 'AdminController@deleteSeance')             ->name('admin_deleteSeance');
});