<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 001056 'Pays' 
         * 
         * description : 
         *      table contenant les intitials des pays.
         * 
         * champs : 
         *      (PK ) initialPays : intitial du pays.
         * 
         * référence : 
         *      none
         * 
         * référencé par : 
         *      Film.initialPays
         *      PaysFilm.initialPays
         */
        Schema::create('Pays', function (Blueprint $table) {
            // champs
            $table->string('initialPays', 2);
            
            // contraintes
            $table->primary('initialPays');
            
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
        Schema::dropIfExists('Pays');
    }
}
