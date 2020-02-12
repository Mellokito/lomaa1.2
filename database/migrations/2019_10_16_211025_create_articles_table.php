<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('titre');
            $table->text('contenu');
            $table->dateTime('date');
            $table->string('auteur')->nullable();
            $table->string('image')->nullable();
            $table->string('fichier')->nullable();
            $table->string('slug');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->boolean('valide')->default(false);
            $table->boolean('publish')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
