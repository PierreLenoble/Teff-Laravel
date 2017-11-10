<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategorieArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 001008 'CategorieArticle' 
         * 
         * description : 
         *      table contenant les categories des articles. (exemple : news, 
         *      evenements2016, ...). 
         * 
         * champs : 
         *      (PK ) nomCategorieArticle : nom de la catégorie.
         * 
         * référence : 
         *      none
         * 
         * référencé par : 
         *      Article.categorieArticle
         */
        Schema::create('CategorieArticle', function (Blueprint $table) {
            // champs
            $table->string('nomCategorieArticle');
            
            // contraintes
            $table->primary('nomCategorieArticle');
            
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
        Schema::dropIfExists('CategorieArticle');
    }
}
