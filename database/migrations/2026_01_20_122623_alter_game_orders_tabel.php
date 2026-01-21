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
        Schema::table('game_orders', function (Blueprint $table) {

            // 1️⃣ Add tenant_id
            $table->foreignId('client_id')
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();

            // 2️⃣ Drop foreign key FIRST
            $table->dropForeign(['user_id']);

            // 3️⃣ Drop column
            $table->dropColumn('user_id');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
