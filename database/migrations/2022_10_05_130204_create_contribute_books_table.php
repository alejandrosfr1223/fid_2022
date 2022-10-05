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
        Schema::create('contribute_books', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('autor')->nullable();
            $table->string('editorial')->nullable();
            $table->string('edicion')->nullable();              // Número de edición
            $table->string('paginas')->nullable();
            $table->string('isbn')->nullable();
            $table->text('notas')->nullable();
            $table->string('clasific')->nullable();
            $table->text('img_1')->nullable();
            $table->text('img_2')->nullable();
            $table->text('img_3')->nullable();
            $table->text('img_4')->nullable();
            $table->text('doc_route')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('status')->nullable();
            $table->text('proyect')->nullable();
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
        Schema::dropIfExists('contribute_books');
    }
};
