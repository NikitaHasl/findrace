<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFulltextIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE races ADD FULLTEXT full(title, description, start, finish)');
        DB::statement('ALTER TABLE cities ADD FULLTEXT full(city_title)');
        DB::statement('ALTER TABLE types_of_race ADD FULLTEXT full(type_of_race)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE races DROP INDEX full');
        DB::statement('ALTER TABLE cities DROP INDEX full');
        DB::statement('ALTER TABLE types_of_race DROP INDEX full');
    }
}
