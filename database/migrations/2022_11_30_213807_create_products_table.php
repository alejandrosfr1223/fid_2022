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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer("service");
            $table->integer("levelsub")->nullable();
            $table->integer("id_service")->nullable();
            $table->integer("id_proyectsub")->nullable();
            $table->string("nameproject")->nullable();
            $table->string("idtableaffected")->nullable();
            $table->integer("price");
            $table->string("priceidstripe")->nullable();
            $table->string("description")->nullable();
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
        Schema::dropIfExists('products');
    }
};
