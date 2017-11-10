<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MetrageTraduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 002048 'MetrageTraduction' 
         * 
         * description : 
         *      table contenant les traductions des différents champs à 
         *      traduire en ce qui concerne les metrages.
         * 
         * champs : 
         * (FK2)(PK ) initialMetrage :  initial du metrage.
         * (FK1)(PK ) initialLangue :   initial de la langue de la traduction.
         *      (   ) nomMetrage :      nom du metrage traduit dans la langue 
         *                              référencée par 'initialLangue'.
         * 
         * référence : 
         *      initialLangue => Langue.initialLangue
         *      initialMetrage => Metrage.initialMetrage
         * 
         * référencé par : 
         *      none
         */
        Schema::create('MetrageTraduction', function (Blueprint $table) {
            // champs
            $table->string('initialMetrage', 4);
            $table->string('initialLangue', 2);
            $table->string('nomMetrage');
            
            // contraintes
            $table->primary(array('initialMetrage', 'initialLangue'));
            
            // foreign key
            $table->foreign('initialLangue')
                    ->references('initialLangue')
                    ->on('Langue');
            
            $table->foreign('initialMetrage')
                    ->references('initialMetrage')
                    ->on('Metrage');
            
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
        Schema::dropIfExists('MetrageTraduction');
    }
}
