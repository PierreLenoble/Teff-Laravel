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
Route::get('/',     'CommonController@news')->name('default');

// TEST
Route::get('/test', 'DefaultController@test')->name('test');

// COMMON
Route::get('/{langue}/news',                                'CommonController@news')                    ->name('common_news')               ->where('langue',$whereLangue);
Route::get('/{langue}/archives',                            'CommonController@archives')                ->name('common_archives')           ->where('langue',$whereLangue);
Route::get('/{langue}/contact',                             'CommonController@contact')                 ->name('common_contact')            ->where('langue',$whereLangue);
Route::get('/{langue}/association',                         'CommonController@association')             ->name('common_association')        ->where('langue',$whereLangue);

// 2016
Route::get('/{langue}/2016/homePage',                       'Edition2016Controller@homePage')           ->name('2016_homePage')             ->where('langue',$whereLangue);
Route::get('/{langue}/2016/film/{idFilm}',                  'Edition2016Controller@film')               ->name('2016_filmDetails')          ->where('langue',$whereLangue)  ->where('idFilm','([0-9]+)');

// 2015
Route::get('/{langue}/2015/homePage',                       'Edition2015Controller@homePage')           ->name('2015_homePage')             ->where('langue',$whereLangue);
Route::get('/{langue}/2015/programme',                      'Edition2015Controller@programme')          ->name('2015_programme')            ->where('langue',$whereLangue);
Route::get('/{langue}/2015/seance',                         'Edition2015Controller@seance')             ->name('2015_seance')               ->where('langue',$whereLangue);
Route::get('/{langue}/2015/billeterie',                     'Edition2015Controller@billeterie')         ->name('2015_billeterie')           ->where('langue',$whereLangue);
Route::get('/{langue}/2015/liste-films',                    'Edition2015Controller@listeFilms')         ->name('2015_listeFilms')           ->where('langue',$whereLangue);
Route::get('/{langue}/2015/liste-films/{idPage}',           'Edition2015Controller@listeFilmsByPage')   ->name('2015_listeFilmsByPage')     ->where('langue',$whereLangue)  ->where('idPage','([0-9]+)');
Route::get('/{langue}/2015/detail-film/{idFilm}',           'Edition2015Controller@filmDetails')        ->name('2015_filmDetails')          ->where('langue',$whereLangue)  ->where('idFilm','([0-9]+)');
Route::get('/{langue}/2015/liste-evenements',               'Edition2015Controller@evenements')         ->name('2015_evenements')           ->where('langue',$whereLangue);
Route::get('/{langue}/2015/liste-evenements/{idPage}',      'Edition2015Controller@evenementsByPage')   ->name('2015_evenementsByPage')     ->where('langue',$whereLangue)  ->where('idPage','([0-9]+)');
Route::get('/{langue}/2015/detail-evenement/{idEvenement}', 'Edition2015Controller@evenementDetails')   ->name('2015_evenementDetails')     ->where('langue',$whereLangue)  ->where('idEvenement','([0-9]+)');
Route::get('/{langue}/2015/liste-invites',                  'Edition2015Controller@invites')            ->name('2015_invites')              ->where('langue',$whereLangue);
Route::get('/{langue}/2015/liste-invites/{idPage}',         'Edition2015Controller@invitesByPage')      ->name('2015_invitesByPage')        ->where('langue',$whereLangue)  ->where('idPage','([0-9]+)');
Route::get('/{langue}/2015/detail-invite/{idInvite}',       'Edition2015Controller@inviteDetails')      ->name('2015_inviteDetails')        ->where('langue',$whereLangue)  ->where('idInvite','([0-9]+)');
Route::get('/{langue}/2015/liste-presse',                   'Edition2015Controller@presse')             ->name('2015_presse')               ->where('langue',$whereLangue);
Route::get('/{langue}/2015/liste-presse/{idPage}',          'Edition2015Controller@presseByPage')       ->name('2015_presseByPage')         ->where('langue',$whereLangue)  ->where('idPage','([0-9]+)');
Route::get('/{langue}/2015/detail-presse/{idArticle}',      'Edition2015Controller@presseDetails')      ->name('2015_presseDetails')        ->where('langue',$whereLangue)  ->where('idArticle','([0-9]+)');
Route::get('/{langue}/2015/infos-pratiques',                'Edition2015Controller@infosPratiques')     ->name('2015_infosPratiques')       ->where('langue',$whereLangue);
Route::get('/{langue}/2015/jury',                           'Edition2015Controller@jury')               ->name('2015_jury')                 ->where('langue',$whereLangue);
// Route::get('/{langue}/2015/gallerie',                       'Edition2015Controller@gallerie')           ->name('2015_gallerie')             ->where('langue',$whereLangue);
Route::get('/{langue}/2015/partenaires',                    'Edition2015Controller@partenaires')        ->name('2015_partenaires')          ->where('langue',$whereLangue);

// 2014
Route::get('/{langue}/2014/homePage',                       'Edition2014Controller@homePage')           ->name('2014_homePage')             ->where('langue',$whereLangue);

// 2013
Route::get('/{langue}/2013/homePage',                       'Edition2013Controller@homePage')           ->name('2013_homePage')             ->where('langue',$whereLangue);
Route::get('/{langue}/2013/programme',                      'Edition2013Controller@programme')          ->name('2013_programme')            ->where('langue',$whereLangue);
Route::get('/{langue}/2013/liste-films',                    'Edition2013Controller@listeFilms')         ->name('2013_listeFilms')           ->where('langue',$whereLangue);
Route::get('/{langue}/2013/liste-films/{idPage}',           'Edition2013Controller@listeFilmsByPage')   ->name('2013_listeFilmsByPage')     ->where('langue',$whereLangue)  ->where('idPage','([0-9]+)');
Route::get('/{langue}/2013/detail-film/{idFilm}',           'Edition2013Controller@filmDetails')        ->name('2013_filmDetails')          ->where('langue',$whereLangue)  ->where('idFilm','([0-9]+)');
Route::get('/{langue}/2013/billeterie',                     'Edition2013Controller@billeterie')         ->name('2013_billeterie')           ->where('langue',$whereLangue);
Route::get('/{langue}/2013/infos-pratiques',                'Edition2013Controller@infosPratiques')     ->name('2013_infosPratiques')       ->where('langue',$whereLangue);
Route::get('/{langue}/2013/liste-presse',                   'Edition2013Controller@presse')             ->name('2013_presse')               ->where('langue',$whereLangue);
Route::get('/{langue}/2013/liste-presse/{idPage}',          'Edition2013Controller@presseByPage')       ->name('2013_presseByPage')         ->where('langue',$whereLangue)  ->where('idPage','([0-9]+)');
Route::get('/{langue}/2013/detail-presse/{idArticle}',      'Edition2013Controller@presseDetails')      ->name('2013_presseDetails')        ->where('langue',$whereLangue)  ->where('idArticle','([0-9]+)');
// Route::get('/{langue}/2013/gallerie',                       'Edition2013Controller@gallerie')           ->name('2013_gallerie')             ->where('langue',$whereLangue);
Route::get('/{langue}/2013/partenaires',                    'Edition2013Controller@partenaires')        ->name('2013_partenaires')          ->where('langue',$whereLangue);
Route::get('/{langue}/2013/lieux',                          'Edition2013Controller@lieux')              ->name('2013_lieux')                ->where('langue',$whereLangue);
Route::get('/{langue}/2013/seances-delocalisees',           'Edition2013Controller@seanceDelocalisee')  ->name('2013_seanceDelocalisee')    ->where('langue',$whereLangue);
Route::get('/{langue}/2013/seances-pedagogiques',           'Edition2013Controller@seancesPedagogiques')->name('2013_seancesPedagogiques')  ->where('langue',$whereLangue);
Route::get('/{langue}/2013/expo',                           'Edition2013Controller@expo')               ->name('2013_expo')                 ->where('langue',$whereLangue);

// 2012
Route::get('/{langue}/2012/homePage',                       'Edition2014Controller@homePage')           ->name('2012_homePage')             ->where('langue',$whereLangue);


// 2011
Route::get('/{langue}/2011/homePage',                       'Edition2011Controller@homePage')           ->name('2011_homePage')             ->where('langue',$whereLangue);
Route::get('/{langue}/2011/programme',                      'Edition2011Controller@programme')          ->name('2011_programme')            ->where('langue',$whereLangue);
Route::get('/{langue}/2011/liste-films',                    'Edition2011Controller@listeFilms')         ->name('2011_listeFilms')           ->where('langue',$whereLangue);
Route::get('/{langue}/2011/liste-films/{idPage}',           'Edition2011Controller@listeFilmsByPage')   ->name('2011_listeFilmsByPage')     ->where('langue',$whereLangue)  ->where('idPage','([0-9]+)');
Route::get('/{langue}/2011/detail-film/{idFilm}',           'Edition2011Controller@filmDetails')        ->name('2011_filmDetails')          ->where('langue',$whereLangue)  ->where('idFilm','([0-9]+)');
Route::get('/{langue}/2011/liste-presse',                   'Edition2011Controller@presse')             ->name('2011_presse')               ->where('langue',$whereLangue);
Route::get('/{langue}/2011/liste-presse/{idPage}',          'Edition2011Controller@presseByPage')       ->name('2011_presseByPage')         ->where('langue',$whereLangue)  ->where('idPage','([0-9]+)');
Route::get('/{langue}/2011/detail-presse/{idArticle}',      'Edition2011Controller@presseDetails')      ->name('2011_presseDetails')        ->where('langue',$whereLangue)  ->where('idArticle','([0-9]+)');
// Route::get('/{langue}/2011/gallerie',                       'Edition2011Controller@gallerie')           ->name('2011_gallerie')             ->where('langue',$whereLangue);
Route::get('/{langue}/2011/partenaires',                    'Edition2011Controller@partenaires')        ->name('2011_partenaires')          ->where('langue',$whereLangue);

