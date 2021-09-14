<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsForRaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations_for_race', function (Blueprint $table) {
            $table->foreignId('race_id')
                ->constrained('races');
            $table->foreignId('user_id')
                ->constrained('users');
            $table->foreignId('status_of_race_id')
                ->constrained('statuses_of_race');
            $table->timestamps();
            $table->primary(['race_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations_for_race');
    }
}
