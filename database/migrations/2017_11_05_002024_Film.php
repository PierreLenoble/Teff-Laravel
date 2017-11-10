<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Film extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 002024 'Film' 
         * 
         * description : 
         *      table contenant tous les films de toutes les éditions.
         * 
         * champs : 
         *      (PK ) idFilm :          identifiant numerique autoincrementé 
         *                              du film.
         *      (   ) urlImageFilm :    url de l'image (ou de l'affiche)
         *                              du film.
         * (FK1)(   ) idRealisateur :   identifiant du réalisateur du film.
         *      (   ) anneeProduction : année de production du film.
         *      (   ) interdictionAge : age minimum de l'audiance du film.
         * (FK2)(   ) initalMetrage :   type de metrage du film.
         *      (   ) dureeMinuteFilm : durée du film en minutes.
         *      (   ) boiteProduction : boite de production du film.
         * 
         * référence : 
         *      idRealisateur => Realisateur.idRealisateur
         *      initalMetrage => Metrage.initalMetrage
         * 
         * référencé par : 
         *      FilmTraduction.idFilm
         *      FilmParSeance.idFilm
         *      GenreDuFilm.idFilm
         *      PaysDuFilm.idFilm
         */
        Schema::create('Film', function (Blueprint $table) {
            // champs
            $table->increments('idFilm');
            $table->string('urlImageFilm');
            $table->integer('idRealisateur')->unsigned();
            $table->integer('anneeProduction');
            $table->string('interdictionAge', 2);
            $table->string('initialMetrage', 4);
            $table->integer('dureeMinuteFilm');
            $table->string('boiteProduction');
            
            // contraintes
            
            // foreign key
            $table->foreign('initialMetrage')
                    ->references('initialMetrage')
                    ->on('Metrage');
            
            $table->foreign('idRealisateur')
                    ->references('idRealisateur')
                    ->on('Realisateur');
            
            // moteur
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Film');
    }
}
