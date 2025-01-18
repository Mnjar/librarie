<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'reservation_date',
        'return_date',
        'payment_status',
        'reservations_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function fine()
    {
        return $this->hasMany(Fine::class);
    }

    /**
     * Hitung denda jika ada keterlambatan
     */
    public function calculateFine()
    {
        $today = now();
        $lateDays = $today->diffInDays($this->return_date, false); // false to get negative if not late

        // Jika terlambat lebih dari 3 hari
        if ($lateDays > 0) { // Hanya jika terlambat (lebih besar dari 0)
            return $lateDays * 15000; // Rp. 15.000 per hari keterlambatan
        }

        return 0;
    }

    /**
     * Menambahkan denda pada reservasi jika overdue
     */
    public function applyFine()
    {
        $fineAmount = $this->calculateFine();

        if ($fineAmount > 0) {
            Fine::create([
                'amount' => $fineAmount,
                'status' => 'unpaid',
                'reservation_id' => $this->id,
            ]);
        }
    }

    /**
     * Periksa apakah reservasi overdue dan terapkan denda
     */
    public function checkAndApplyFine()
    {
        if ($this->reservations_status == 'overdue') {
            $this->applyFine();
        }
    }
}
