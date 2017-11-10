<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GenreFilmTraduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 002032 'GenreFilmTraduction' 
         * 
         * description : 
         *      table contenant les traductions des différents champs à 
         *      traduire en ce qui concerne les genres de film.
         * 
         * champs : 
         * (FK1)(PK ) idGenreFilm :     identifiant du genre du film.
         * (FK2)(PK ) initialLangue :   initial de la langue de la traduction.
         *      (   ) nomGenreFilm :    nom du genre du film traduit dans la 
         *                              langue référencée par 'initialLangue'.
         * 
         * référence : 
         *      idGenreFilm => GenreFilm.idGenreFilm
         *      initialLangue => Langue.initialLangue
         * 
         * référencé par : 
         *      none
         */
        Schema::create('GenreFilmTraduction', function (Blueprint $table) {
            // champs
            $table->integer('idGenreFilm')->unsigned();
            $table->string('initialLangue', 2);
            $table->string('nomGenreFilm');
            
            // contraintes
            $table->primary(array('idGenreFilm', 'initialLangue'));
            
            // foreign key
            $table->foreign('idGenreFilm')
                    ->references('idGenreFilm')
                    ->on('GenreFilm');
            
            $table->foreign('initialLangue')
                    ->references('initialLangue')
                    ->on('Langue');
            
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
        Schema::dropIfExists('GenreFilmTraduction');
    }
}
