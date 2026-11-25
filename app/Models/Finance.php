<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $table = 'finances';

    protected $fillable = [
        'user_id',
        'aid_request_id',
        'donation_id',
        'type',
        'amount',
        'description',
        'proof',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aidRequest()
    {
        return $this->belongsTo(AidRequest::class);
    }

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
