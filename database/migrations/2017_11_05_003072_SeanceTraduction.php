<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeanceTraduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 003072 'SeanceTraduction' 
         * 
         * description : 
         *      table contenant les traductions des différents champs à 
         *      traduire en ce qui concerne les séances.
         * 
         * champs : 
         * (FK1)(PK ) idSeance :        identifiant de la séance traduite.
         * (FK2)(PK ) initialLangue :   initial de la langue de la traduction.
         *      (   ) nomSeance :       nom de la séance traduit dans la langue 
         *                              référencée par 'initialLangue'.
         * 
         * référence : 
         *      idSeance => Seance.idSeance
         *      initialLangue => Langue.initialLangue
         * 
         * référencé par : 
         *      none
         */
        Schema::create('SeanceTraduction', function (Blueprint $table) {
            // champs
            $table->integer('idSeance')->unsigned();
            $table->string('initialLangue', 2);
            $table->string('nomSeance');
            
            // contraintes
            $table->primary(array('idSeance', 'initialLangue'));
            
            // foreign key
            $table->foreign('idSeance')
                    ->references('idSeance')
                    ->on('Seance');
            
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
        Schema::dropIfExists('SeanceTraduction');
    }
}
