<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 002008 'Article' 
         * 
         * description : 
         *      table contenant tous les articles de toutes les éditions.
         * 
         * champs : 
         *      (PK ) idArticle :           identifiant numerique autoincrementé 
         *                                  de l'article.
         *      (   ) urlImageArticle :     url de l'image de l'article.
         * (FK1)(UK1) nomCategorieArticle : categorie de l'article.
         *      (UK1) ordreArticle :        position orinal de l'article au 
         *                                  sein de sa categorie.
         *      (   ) dateTimeArticle :     date et heure de la publication 
         *                                  de l'article.
         * 
         * référence : 
         *      nomCategorieArticle => CategorieArticle.nomCategorieArticle
         * 
         * référencé par : 
         *      ArticleTraduction.idArticle
         */
        Schema::create('Article', function (Blueprint $table) {
            // champs
            $table->increments('idArticle');
            $table->string('urlImageArticle');
            $table->string('nomCategorieArticle');
            $table->integer('ordreArticle');
            $table->dateTime('dateTimeArticle');
            
            // contraintes
            $table->unique(array('nomCategorieArticle', 'ordreArticle'));
            
            // foreign key
            $table->foreign('nomCategorieArticle')
                    ->references('nomCategorieArticle')
                    ->on('CategorieArticle');
            
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
        Schema::dropIfExists('Article');
    }
}
