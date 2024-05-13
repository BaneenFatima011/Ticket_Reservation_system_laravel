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
        Schema::table('transports', function (Blueprint $table) {
            $table->foreign(['transport_type'], 'transports_ibfk_1')->references(['transport_id'])->on('transport_types')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['company_id'], 'transports_ibfk_2')->references(['company_id'])->on('companies')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transports', function (Blueprint $table) {
            $table->dropForeign('transports_ibfk_1');
            $table->dropForeign('transports_ibfk_2');
        });
    }
};
