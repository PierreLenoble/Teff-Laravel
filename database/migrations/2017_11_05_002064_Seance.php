<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Seance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 002064 'Seance' 
         * 
         * description : 
         *      table contenant les infos des réalisateurs des films.
         * 
         * champs : 
         *      (PK ) idSeance :            identifiant numerique autoincrementé
         *                                  de la séance.
         * (FK1)(   ) adminNomLieuSeance :  nom du lieu de la séance tel qu'il 
         *                                  sera affiché dans le module
         *                                  administrateur.
         *      (   ) dateTimeSeance :      date et heure à laquelle la séance 
         *                                  commence.
         *      (   ) dureeMinuteSeance :   durée de la séance en minute 
         *                                  (à 5 minutes prêt).
         * 
         * référence : 
         *      adminNomLieuSeance => LieuSeance.adminNomLieuSeance
         * 
         * référencé par : 
         *      FilmParSeance.idSeance
         *      SeanceTraduction.idSeance
         */
        Schema::create('Seance', function (Blueprint $table) {
            // champs
            $table->increments('idSeance');
            $table->string('adminNomLieuSeance');
            $table->dateTime('dateTimeSeance');
            $table->integer('dureeMinuteSeance');
            
            // foreign key
            $table->foreign('adminNomLieuSeance')
                    ->references('adminNomLieuSeance')
                    ->on('LieuSeance');
            
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
        Schema::dropIfExists('Seance');
    }
}
