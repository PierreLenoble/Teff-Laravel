<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LieuSeanceTraduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 002040 'LieuSeanceTraduction' 
         * 
         * description : 
         *      table contenant les traductions des différents champs à 
         *      traduire en ce qui concerne les noms des lieux dans lesquel
         *      se déroulent les séances.
         * 
         * champs : 
         * (FK1)(PK ) adminNomLieuSeance :  nom du lieu de la séance tel qu'il 
         *                                  sera affiché dans le module
         *                                  administrateur.
         * (FK2)(PK ) initialLangue :       initial de la langue de la 
         *                                  traduction.
         * (   )(   ) nomLieuSeance :       nom du lieu de la séance traduit 
         *                                  dans la langue référencée par
         *                                  'initialLangue'.
         * 
         * référence : 
         *      adminNomLieuSeance => LieuSeance.adminNomLieuSeance
         *      initialLangue => Langue.initialLangue
         * 
         * référencé par : 
         *      none
         */
        Schema::create('LieuSeanceTraduction', function (Blueprint $table) {
            // champs
            $table->string('adminNomLieuSeance');
            $table->string('initialLangue', 2);
            $table->string('nomLieuSeance');
            
            // contraintes
            $table->primary(array('adminNomLieuSeance', 'initialLangue'));
            
            // foreign key
            $table->foreign('adminNomLieuSeance')
                    ->references('adminNomLieuSeance')
                    ->on('LieuSeance');
            
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
        Schema::dropIfExists('LieuSeanceTraduction');
    }
}
