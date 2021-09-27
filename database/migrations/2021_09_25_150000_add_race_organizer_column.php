<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRaceOrganizerColumn extends Migration
{
    public function up(): void
    {
        Schema::table('races', function (Blueprint $table): void {
            $table->foreignId('organizer_id')->nullable()->after('finish')
                ->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('races', function (Blueprint $table): void {
            $table->dropColumn('organizer_id');
        });
    }
}
