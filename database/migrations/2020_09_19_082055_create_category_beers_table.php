<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_beers', function (Blueprint $table) {
            $table->unsignedBigInteger('beer_id')->unsigned()->index();
            $table->integer('beer_category_id')->unsigned()->index();
            $table->foreign('beer_id')->references('id')->on('beers')->onDelete('cascade');
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
        Schema::dropIfExists('category_beers');
    }
}
