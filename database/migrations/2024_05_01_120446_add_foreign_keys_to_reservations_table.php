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
        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign(['passenger_id'], 'reservations_ibfk_2')->references(['passenger_id'])->on('passengers')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['seat_id'], 'reservations_ibfk_3')->references(['seat_id'])->on('seats')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign('reservations_ibfk_2');
            $table->dropForeign('reservations_ibfk_3');
        });
    }
};
