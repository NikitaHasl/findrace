<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128);
            $table->foreignId('city_id')
                ->constrained('cities')
                ->onUpdate('cascade');
            $table->foreignId('type_of_race_id')
                ->constrained('types_of_race')
                ->onUpdate('cascade');
            $table->dateTime('date');
            $table->integer('distance');
            $table->string('description', 1048);
            $table->string('start', 128);
            $table->string('finish', 128);
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
        Schema::dropIfExists('races');
    }
}
