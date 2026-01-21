<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('gift_card_codes', function (Blueprint $table) {
            $table->foreignId('used_by')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('gift_card_codes', function (Blueprint $table) {
            $table->foreignId('used_by')->nullable(false)->change();
        });
    }
};
