<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticiafotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticiafotos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('noticia_id');
            $table->string('foto', 100);
            $table->string('legenda', 200)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('noticia_id')->references('id')->on('noticias');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('noticiafotos');
    }
}
