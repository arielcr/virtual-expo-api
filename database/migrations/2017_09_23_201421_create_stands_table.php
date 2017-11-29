<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');            
            $table->boolean('booked');
            $table->boolean('free');
            $table->decimal('price', 10, 2);
            $table->string('image');
            $table->integer('event_id')->unsigned();
            $table->integer('company_id')->nullable()->unsigned();

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('stands');
    }
}
