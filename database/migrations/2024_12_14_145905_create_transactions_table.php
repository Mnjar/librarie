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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade');
            $table->enum('transaction_type', ['borrow', 'purchase']);
            $table->integer('quantity');
            $table->timestamp('transaction_date')->useCurrent();
            $table->string('shipping_address')->nullable(); // Menambahkan kolom alamat pengiriman
            $table->enum('shipping_status', ['pending', 'shipped', 'delivered', 'canceled'])->default('pending');
            $table->date('due_date')->nullable();
            $table->date('return_date')->nullable();
            $table->decimal('fine', 8, 2)->nullable();
            $table->string('payment_status')->nullable();  // Status pembayaran
            $table->string('payment_url')->nullable();     // URL untuk pembayaran Midtrans
            $table->string('payment_token')->nullable();   // Token pembayaran Midtrans
            $table->string('midtrans_transaction_id')->nullable();  // ID transaksi Midtrans
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
