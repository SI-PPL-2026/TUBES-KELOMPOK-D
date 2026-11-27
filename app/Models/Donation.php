<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations';

    protected $fillable = [
        'user_id',
        'payment_method_id',
        'donor_name',
        'whatsapp',
        'amount',
        'message',
        'transfer_proof',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function finance()
    {
        return $this->hasOne(Finance::class, 'donation_id');
    }
}
