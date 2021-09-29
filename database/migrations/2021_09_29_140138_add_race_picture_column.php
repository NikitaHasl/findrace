<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRacePictureColumn extends Migration
{
    public function up(): void
    {
        Schema::table('races', function (Blueprint $table): void {
            $table->text('picture')->before('date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('races', function (Blueprint $table): void {
            $table->dropColumn('picture');
        });
    }
}
