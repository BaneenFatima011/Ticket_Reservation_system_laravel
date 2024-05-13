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
        Schema::table('city', function (Blueprint $table) {
            $table->foreign(['country_id'], 'city_ibfk_1')->references(['country_id'])->on('countries')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('city', function (Blueprint $table) {
            $table->dropForeign('city_ibfk_1');
        });
    }
};
