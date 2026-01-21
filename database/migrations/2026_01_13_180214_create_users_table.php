<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // NULL = Super Admin
            $table->foreignId('tenant_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            // Roles
            $table->enum('role', [
                'super_admin',
                'merchant_admin',
                'merchant_staff',
            ])->default('merchant_admin');

            $table->boolean('is_blocked')->default(false);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
