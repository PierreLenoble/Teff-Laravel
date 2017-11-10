<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleTraduction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table 003008 'ArticleTraduction' 
         * 
         * description : 
         *      table contenant les traductions des différents champs à 
         *      traduire en ce qui concerne les articles.
         * 
         * champs : 
         * (FK1)(PK ) idArticle :       identifiant de l'article.
         * (FK2)(PK ) initialLangue :   initial de la langue de la traduction.
         *      (   ) titreArticle :    titre de l'article traduit dans la 
         *                              langue référencée par 'initialLangue'.
         *      (   ) contenuArticle :  contenu de l'article traduit dans la 
         *                              langue référencée par 'initialLangue'.
         * 
         * référence : 
         *      idArticle => Article.idArticle
         *      initialLangue => Langue.initialLangue
         * 
         * référencé par : 
         *      none
         */
        Schema::create('ArticleTraduction', function (Blueprint $table) {
            // champs
            $table->integer('idArticle')->unsigned();
            $table->string('initialLangue', 2);
            $table->string('titreArticle');
            $table->text('contenuArticle');
            
            // contraintes
            $table->primary(array('idArticle', 'initialLangue'));
            
            // foreign key
            $table->foreign('idArticle')
                    ->references('idArticle')
                    ->on('Article');
            
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
        Schema::dropIfExists('ArticleTraduction');
    }
}
