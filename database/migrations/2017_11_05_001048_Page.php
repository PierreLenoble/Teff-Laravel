<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Page extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 001048 'Page' 
         * 
         * description : 
         *      table contenant les intitules des pages du site.
         * 
         * champs : 
         *      (PK ) nomPage : nom de la page du site.
         * 
         * référence : 
         *      none
         * 
         * référencé par : 
         *      ClePage.nomPage
         */
        Schema::create('Page', function (Blueprint $table) {
            // champs
            $table->string('nomPage');
            
            // contraintes
            $table->primary('nomPage');
            
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
        Schema::dropIfExists('Page');
    }
}
