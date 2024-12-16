<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'amount',
        'paid_at',
        'status',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
