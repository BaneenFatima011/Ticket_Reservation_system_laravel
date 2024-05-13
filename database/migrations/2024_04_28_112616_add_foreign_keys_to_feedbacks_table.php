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
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->foreign(['passenger_id'], 'feedbacks_ibfk_1')->references(['passenger_id'])->on('passengers')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['booking_id'], 'feedbacks_ibfk_2')->references(['reservation_id'])->on('reservations')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->dropForeign('feedbacks_ibfk_1');
            $table->dropForeign('feedbacks_ibfk_2');
        });
    }
};
