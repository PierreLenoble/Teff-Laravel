<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GenreFilmDuFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 003040 'GenreFilmDuFilm' 
         * 
         * description : 
         *      table contenant les differents genres associés à chacun 
         *      des films.
         * 
         * champs : 
         * (FK1)(PK ) idFilm :        identifiant du film.
         * (FK2)(PK ) idGenreFilm :   identifiant du genre du film.
         * 
         * référence : 
         *      idFilm => Film.idFilm
         *      idGenreFilm => GenreFilm.idGenreFilm
         * 
         * référencé par : 
         *      none
         */
        Schema::create('GenreFilmDuFilm', function (Blueprint $table) {
            // champs
            $table->integer('idFilm')->unsigned();
            $table->integer('idGenreFilm')->unsigned();
            
            // contraintes
            $table->primary(array('idFilm', 'idGenreFilm'));
            
            // foreign key
            $table->foreign('idFilm')
                    ->references('idFilm')
                    ->on('Film');
            
            $table->foreign('idGenreFilm')
                    ->references('idGenreFilm')
                    ->on('GenreFilm');
            
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
        Schema::dropIfExists('GenreFilmDuFilm');
    }
}
