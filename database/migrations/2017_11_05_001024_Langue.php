<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Langue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 001024 'Langue' 

         * 
         * description : 
         *      table contenant les langues dans lesquelles le site est traduit.
         * 
         * champs : 
         *      (PK ) initialLangue :   initial de la langue sur 2 positions.
         *      (   ) actifLangue :     flag si la langue est active sur 
         *                              le site.
         * 
         * référence : 
         *      none
         * 
         * référencé par : 
         *      ArticleTraduction.initialLangue
         *      FilmTraduction.initialLangue
         *      GenreFilmTraduction.initialLangue
         *      LieuSeanceTraduction.initialLangue
         *      MetrageTraduction.initialLangue
         *      PageTexteTraduction.initialLangue
         *      PaysTraduction.initialLangue
         *      RealisateurTraduction.initialLangue
         *      SeanceTraduction.initialLangue
         */
        Schema::create('Langue', function(Blueprint $table) {
            // champs
            $table->string('initialLangue', 2);
            $table->boolean('actifLangue');
            
            // contraintes
            $table->primary('initialLangue');
            
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
        Schema::dropIfExists('Langue');
    }
}
