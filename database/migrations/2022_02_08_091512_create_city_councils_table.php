<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityCouncilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_councils', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('sex');
            $table->string('status');
            $table->string('religion');
            $table->string('address');
            $table->string('contact');
            $table->string('education');
            $table->date('date-elected');
            $table->string('type');
            $table->longText('description');
            $table->string('image');
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
        Schema::dropIfExists('city_councils');
    }
}
