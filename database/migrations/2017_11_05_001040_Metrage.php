<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Metrage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 001040 'Metrage' 
         * 
         * description : 
         *      table contenant les initials des formats de metrage 
         *      (CM = court-metrage, LM = long-metrage,...) des films.
         * 
         * champs : 
         *      (PK ) initialMetrage :  initial du metrage sur 2 positions.
         * 
         * référence : 
         *      none
         * 
         * référencé par : 
         *      Film.initialMetrage
         *      MetrageTraduction.initialMetrage
         */
        Schema::create('Metrage', function(Blueprint $table) {
            // champs
            $table->string('initialMetrage', 4);
            
            // contraintes
            $table->primary('initialMetrage');
            
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
        Schema::dropIfExists('Metrage');
    }
}
