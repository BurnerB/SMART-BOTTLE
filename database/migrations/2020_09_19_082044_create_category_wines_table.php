<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_wines', function (Blueprint $table) {
            $table->unsignedBigInteger('wine_id')->unsigned()->index();
            $table->integer('wine_category_id')->unsigned()->index();
            $table->foreign('wine_id')->references('id')->on('wines')->onDelete('cascade');
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
        Schema::dropIfExists('category_wines');
    }
}
