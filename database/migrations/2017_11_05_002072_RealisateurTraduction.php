<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RealisateurTraduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 002072 'RealisateurTraduction' 
         * 
         * description : 
         *      table contenant les traductions des différents champs à 
         *      traduire en ce qui concerne les réalisateurs.
         * 
         * champs : 
         * (FK1)(PK ) idRealisateur :           identifiant du réalisateur.
         * (FK2)(PK ) initialLangue :           initial de la langue de la 
         *                                      traduction.
         *      (   ) presentationRealisateur : texte de présentation du 
         *                                      réalisateur traduit dans la 
         *                                      langue référencée par 
         *                                      'initialLangue'.
         * 
         * référence : 
         *      idRealisateur => Realisateur.idRealisateur
         *      initialLangue => Langue.initialLangue
         * 
         * référencé par : 
         *      none
         */
        Schema::create('RealisateurTraduction', function (Blueprint $table) {
            // champs
            $table->integer('idRealisateur')->unsigned();
            $table->string('initialLangue', 2);
            $table->text('presentationRealisateur');
            
            // contraintes
            $table->primary(array('idRealisateur', 'initialLangue'));
            
            // foreign key
            $table->foreign('idRealisateur')
                    ->references('idRealisateur')
                    ->on('Realisateur');
            
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
        Schema::dropIfExists('RealisateurTraduction');
    }
}
