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
        Schema::table('gift_card_codes', function (Blueprint $table) {
            $table->foreignId('tenant_id')
                ->after('gift_card_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('used_by')
                ->after('tenant_id')
                ->constrained('clients')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gift_card_codes', function (Blueprint $table) {
            //
        });
    }
};
