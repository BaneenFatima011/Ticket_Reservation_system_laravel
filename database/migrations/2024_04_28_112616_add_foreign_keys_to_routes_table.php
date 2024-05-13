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
        Schema::table('routes', function (Blueprint $table) {
            $table->foreign(['origin'], 'routes_ibfk_2')->references(['city_id'])->on('city')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['destination'], 'routes_ibfk_3')->references(['city_id'])->on('city')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['bus_id'], 'routes_ibfk_4')->references(['bus_id'])->on('transports')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('routes', function (Blueprint $table) {
            $table->dropForeign('routes_ibfk_2');
            $table->dropForeign('routes_ibfk_3');
            $table->dropForeign('routes_ibfk_4');
        });
    }
};
