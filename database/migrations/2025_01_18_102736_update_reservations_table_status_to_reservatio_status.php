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
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['status']);  // Hapus kolom status
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('reservations_status', ['borrowed', 'done', 'overdue'])->nullable()->after('payment_status');  // Menambahkan kolom reservations_status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->enum('status', ['pending', 'completed', 'cancelled'])->nullable()->after('payment_status'); // Menambahkan kembali kolom status
        });

        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('reservations_status'); // Menghapus kolom reservations_status
        });
    }
};
