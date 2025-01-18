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
        // Hapus foreign key yang ada sebelumnya (ke tabel transactions)
        Schema::table('fines', function (Blueprint $table) {
            $table->dropForeign(['transaction_id']);  // Hapus foreign key yang mengarah ke transactions
            $table->dropColumn('transaction_id');     // Hapus kolom transaction_id
        });

        // Tambahkan kolom baru yang mengarah ke reservations
        Schema::table('fines', function (Blueprint $table) {
            $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // Jika rollback, kembalikan perubahan
        Schema::table('fines', function (Blueprint $table) {
            $table->dropForeign(['reservation_id']);
            $table->dropColumn('reservation_id');
        });

        Schema::table('fines', function (Blueprint $table) {
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade');
        });
    }
};
