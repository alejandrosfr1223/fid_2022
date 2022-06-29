<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor')->nullable();
            $table->string('editorial')->nullable();
            $table->string('edicion')->nullable();              // Número de edición
            $table->string('paginas')->nullable();
            $table->string('isbn')->nullable();
            $table->string('enlace');                           // Enlace o url del documento
            $table->string('url_img_caratula')->nullable();     // URL de la imagen de la caratula del libro
            $table->text('notas')->nullable();
            $table->boolean('ebv')->nullable();
            $table->boolean('jdr')->nullable();
            $table->boolean('fid_inv')->nullable();
            $table->boolean('divpast')->nullable();
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
        Schema::dropIfExists('books');
    }
};
