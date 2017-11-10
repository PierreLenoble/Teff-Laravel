<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaysTraduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 002056 'PaysTraduction' 
         * 
         * description : 
         *      table contenant les traductions des différents champs à 
         *      traduire en ce qui concerne les pays.
         * 
         * champs : 
         * (FK2)(PK ) initialPays :     initial du nom du pays.
         * (FK1)(PK ) initialLangue :   initial de la langue de la traduction.
         *      (   ) nomPays :         nom du pays traduit dans la langue 
         *                              référencée par 'initialLangue'.
         * 
         * référence : 
         *      initialLangue => Langue.initialLangue
         *      initialPays => Pays.initialPays
         * 
         * référencé par : 
         *      none
         */
        Schema::create('PaysTraduction', function (Blueprint $table) {
            // champs
            $table->string('initialPays', 2);
            $table->string('initialLangue', 2);
            $table->string('nomPays');
            
            // contraintes
            $table->primary(array('initialPays', 'initialLangue'));
            
            // foreign key
            $table->foreign('initialLangue')
                    ->references('initialLangue')
                    ->on('Langue');
            
            $table->foreign('initialPays')
                    ->references('initialPays')
                    ->on('Pays');
            
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
        Schema::dropIfExists('PaysTraduction');
    }
}
