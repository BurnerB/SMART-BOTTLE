<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('page_title');
            $table->string('author')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->longText('css')->nullable();
            $table->longText('keywords')->nullable();
            $table->string('language')->nullable();
            $table->string('revisit_after')->nullable();
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
        Schema::dropIfExists('seos');
    }
}
