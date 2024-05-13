<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->integer('route_id', true);
            $table->integer('bus_id')->index('bus_id');
            $table->integer('origin')->index('origin');
            $table->integer('destination')->index('destination');
            $table->float('distance');
            $table->time('duration');
            $table->dateTime('arrival_time');
            $table->dateTime('departure_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
