<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaysFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 003056 'PaysFilm' 
         * 
         * description : 
         *      table contenant les pays de production des films.
         * 
         * champs : 
         * (FK2)(PK ) initialPays : initial du pays producteur du film.
         * (FK1)(PK ) idFilm :      identifiant du film.
         * 
         * référence : 
         *      idFilm => Film.idFilm
         *      initialPays => Pays.initialPays
         * 
         * référencé par : 
         *      none
         */
        Schema::create('PaysFilm', function (Blueprint $table) {
            // champs
            $table->string('initialPays', 2);
            $table->integer('idFilm')->unsigned();
            
            // contraintes
            $table->primary(array('initialPays', 'idFilm'));
            
            // foreign key
            $table->foreign('idFilm')
                    ->references('idFilm')
                    ->on('Film');
            
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
        Schema::dropIfExists('PaysFilm');
    }
}
