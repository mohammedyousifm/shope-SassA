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
        Schema::create('clent_notification', function (Blueprint $table) {
            $table->id();

            // المستخدم المستلم (null = لجميع المستخدمين)
            $table->foreignId('client_id')
                ->constrained()
                ->cascadeOnDelete();

            // من أرسل الإشعار (Admin)
            $table->foreignId('sender_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // نوع الإشعار
            $table->string('type');
            // wallet_deposit
            // deposit_status_changed
            // order_status_changed
            // admin_message

            // بيانات مرنة (رسالة الأدمن + تفاصيل)
            $table->json('data');

            // وقت القراءة
            $table->timestamp('read_at')->nullable();

            $table->timestamps();

            $table->index(['client_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clent_notification');
    }
};
