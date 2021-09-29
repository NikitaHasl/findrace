<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompositeIndexInRegistrationsForRaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations_for_race', function (Blueprint $table) {
            $table->unique(['race_id', 'place']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrations_for_race', function (Blueprint $table) {
            $table->dropUnique(['race_id', 'place']);
        });
    }
}
