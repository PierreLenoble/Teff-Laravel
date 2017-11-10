<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GenreFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 001016 'GenreFilm' 
         * 
         * description : 
         *      table contenant les identifiants des genres des films. 
         * 
         * champs : 
         *      (PK ) idGenreFilm :             identifiant numérique 
         *                                      autoincrémenté du genre du film.
         * 
         * référence : 
         *      none
         * 
         * référencé par : 
         *      GenreFilmDuFilm.idGenreFilm
         *      GenreFilmTraduction.idGenreFilm
         */
        Schema::create('GenreFilm', function (Blueprint $table) {
            // champs
            $table->increments('idGenreFilm');
            
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
        Schema::dropIfExists('GenreFilm');
    }
}
