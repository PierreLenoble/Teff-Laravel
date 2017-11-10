<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilmParSeance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 003016 'FilmParSeance' 
         * 
         * description : 
         *      table contenant les films projetés lors des séances ainsi que 
         *      l'ordre dans lequel ils sont projeté.
         * 
         * champs : 
         * (FK1)(PK ) idFilm :      identifiant du film projeté pendant 
         *                          la séance.
         * (FK2)(PK ) idSeance :    identifiant de la séance.
         *      (   ) ordreFilm :   ordre de projection du film dans la seance.
         * 
         * référence : 
         *      idFilm => Film.idFilm
         *      idSeance => Seance.idSeance
         * 
         * référencé par : 
         *      none
         */
        Schema::create('FilmParSeance', function (Blueprint $table) {
            // champs
            $table->integer('idFilm')->unsigned();
            $table->integer('idSeance')->unsigned();
            $table->integer('ordreFilm');
            
            // contraintes
            $table->primary(array('idFilm', 'idSeance'));
            
            // foreign key
            $table->foreign('idFilm')
                    ->references('idFilm')
                    ->on('Film');
            
            $table->foreign('idSeance')
                    ->references('idSeance')
                    ->on('Seance');
            
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
        Schema::dropIfExists('FilmParSeance');
    }
}
