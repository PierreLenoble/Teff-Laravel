<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageTextTraduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 003048 'PageTextTraduction' 
         * 
         * description : 
         *      table contenant les traductions des différents champs à 
         *      traduire en ce qui concerne les différents bloc de texte des
         *      page web.
         * 
         * champs : 
         * (FK1)(PK ) idClePage :       identifiant de la cle + page.
         * (FK2)(PK ) initialLangue :   initial de la langue de la traduction.
         *      (   ) textPage :        bloc de texte traduit dans la langue 
         *                              référencée par 'initialLangue'.
         * 
         * référence : 
         *      idClePage => ClePage.idClePage
         *      initialLangue => Langue.initialLangue
         * 
         * référencé par : 
         *      none
         */
        Schema::create('PageTextTraduction', function (Blueprint $table) {
            // champs
            $table->integer('idClePage')->unsigned();
            $table->string('initialLangue', 2);
            $table->text('textPage');
            
            // contraintes
            $table->primary(array('idClePage', 'initialLangue'));
            
            // foreign key
            $table->foreign('idClePage')
                    ->references('idClePage')
                    ->on('ClePage');
            
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
        Schema::dropIfExists('PageTextTraduction');
    }
}
