<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySpiritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_spirits', function (Blueprint $table) {
            $table->unsignedBigInteger('spirit_id')->unsigned()->index();
            $table->integer('spirit_category_id')->unsigned()->index();
            $table->foreign('spirit_id')->references('id')->on('spirits')->onDelete('cascade');
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
        Schema::dropIfExists('category_spirits');
    }
}
