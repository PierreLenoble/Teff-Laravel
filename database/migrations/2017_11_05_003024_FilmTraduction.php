<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilmTraduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 003024 'FilmTraduction' 
         * 
         * description : 
         *      table contenant les traductions des différents champs à 
         *      traduire en ce qui concerne les films.
         * 
         * champs : 
         * (FK1)(PK ) idFilm :          identifiant du film.
         * (FK2)(PK ) initialLangue :   initial de la langue de la traduction.
         *      (   ) lienVideo :       lien video de la bande d'annonce du 
         *                              film dans la langue référencée par 
         *                              'initialLangue'.
         *      (   ) nomFilm :         nom du film dans la langue référencée 
         *                              par 'initialLangue'.
         *      (   ) resumeFilm :      resumé du film dans la langue référencée 
         *                              par 'initialLangue'.
         * 
         * référence : 
         *      idFilm => Film.idFilm
         *      initialLangue => Langue.initialLangue
         * 
         * référencé par : 
         *      none
         */
        Schema::create('FilmTraduction', function (Blueprint $table) {
            // champs
            $table->integer('idFilm')->unsigned();
            $table->string('initialLangue', 2);
            $table->string('lienVideo');
            $table->string('nomFilm');
            $table->text('resumeFilm');
            
            // contraintes
            $table->primary(array('idFilm', 'initialLangue'));
            
            // foreign key
            $table->foreign('idFilm')
                    ->references('idFilm')
                    ->on('Film');
            
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
        Schema::dropIfExists('FilmTraduction');
    }
}
