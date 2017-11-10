<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 002016 'ClePage' 
         * 
         * description : 
         *      table contenant les clés des pages ( = nom des différents blocs 
         *      de texte constituant une page web).
         * 
         * champs : 
         *      (PK ) idClePage :   identifiant numerique autoincrementé 
         *                          des clés des pages.
         * (FK )(UK1) nomPage :     initial de la langue de la traduction.
         *      (UK1) nomClePage :  nom de la cle de la page référencée 
         *                          par 'nomPage'.
         * 
         * référence : 
         *      nomPage => Page.nomPage
         * 
         * référencé par : 
         *      PageTextTraduction.idClePage
        */
        Schema::create('ClePage', function (Blueprint $table) {
            // champs
            $table->increments('idClePage');
            $table->string('nomPage');
            $table->string('nomClePage');
            
            // contraintes
            $table->unique(array('nomPage','nomClePage'));
            
            // foreign key
            $table->foreign('nomPage')
                    ->references('nomPage')
                    ->on('Page');
            
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
        Schema::dropIfExists('ClePage');
    }
}
