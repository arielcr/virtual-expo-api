<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_stands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stand_id')->unsigned();
            $table->integer('visitor_id')->unsigned();

            $table->foreign('stand_id')->references('id')->on('stands');
            $table->foreign('visitor_id')->references('id')->on('visitors');

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
        Schema::dropIfExists('visitor_stands');
    }
}
