<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Realisateur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 001064 'Realisateur' 
         * 
         * description : 
         *      table contenant les infos des réalisateurs des films.
         * 
         * champs : 
         *      (PK ) idRealisateur :       identifiant numérique autoincrementé 
         *                                  du réalisateur.
         *      (   ) nomRealisateur :      nom du réalisateur.
         *      (   ) urlImageRealisateur : url de l'image ou de la photo 
         *                                  du réalisateur.
         * 
         * référence : 
         *      none
         * 
         * référencé par : 
         *      Film.idRealisateur
         *      RealisateurTraduction.idRealisateur
         */
        Schema::create('Realisateur', function (Blueprint $table) {
            //champs
            $table->increments('idRealisateur');
            $table->string('nomRealisateur');
            $table->string('urlImageRealisateur');
            
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
        Schema::dropIfExists('Realisateur');
    }
}
