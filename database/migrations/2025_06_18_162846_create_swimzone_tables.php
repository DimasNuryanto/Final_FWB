<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // KATEGORI KOLAM (misal: Anak, Dewasa, VIP)
        Schema::create('pool_Categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // KOLOM RENANG
        Schema::create('pools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price_per_hour', 10, 2);
            $table->string('image')->nullable();
            $table->integer('capacity')->default(0); // jumlah maksimal orang
            $table->foreignId('pool_category_id')->constrained('pool_categories')->onDelete('cascade');
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });

        // RESERVASI
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('pool_id')->constrained('pools')->onDelete('cascade');
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->decimal('total_price', 12, 2)->default(0);
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
        });

        // PEMBAYARAN
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->decimal('amount_paid', 12, 2);
            $table->enum('payment_method', ['cash', 'qr', 'transfer'])->nullable();
            $table->timestamps();
        });

        // PENGATURAN SISTEM
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('pools');
        Schema::dropIfExists('Categories');
    }
};
