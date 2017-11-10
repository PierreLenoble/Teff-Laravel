<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LieuSeance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 001032 'LieuSeance' 
         * 
         * description : 
         *      table contenant l'adresses du lieu des séances.
         * 
         * champs : 
         *      (PK ) adminNomLieuSeance :      nom du lieu de la séance tel 
         *                                      qu'il sera affiché dans le 
         *                                      module administrateur.
         *      (   ) adresse1LieuSeance :      premiere ligne de l'adresse du 
         *                                      lieu de la seance.
         *      (   ) adresse2LieuSeance :      deuxieme ligne de l'adresse du 
         *                                      lieu de la seance.
         *      (   ) codePostalLieuSeance :    code postal de l'adresse du 
         *                                      lieu de la seance.
         *      (   ) localiteLieuSeance :      localité de l'adresse du 
         *                                      lieu de la seance.
         * 
         * référence : 
         *      none
         * 
         * référencé par : 
         *      Seance.adminNomLieuSeance
         *      LieuSeanceTraduction.adminNomLieuSeance
         */
        Schema::create('LieuSeance', function (Blueprint $table) {
            // champs
            $table->string('adminNomLieuSeance');
            $table->string('adresse1LieuSeance');
            $table->string('adresse2LieuSeance');
            $table->string('codePostalLieuSeance');
            $table->string('localiteLieuSeance');
            
            // contraintes
            $table->primary('adminNomLieuSeance');
            
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
        Schema::dropIfExists('LieuSeance');
    }
}
