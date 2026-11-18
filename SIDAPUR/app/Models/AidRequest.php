<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidRequest extends Model
{
    use HasFactory;

    protected $table = 'aid_requests';

    protected $fillable = [
        'user_id',
        'assistance_type',
        'reason',
        'ktm_photo',
        'qris_proof',
        'stall_name',
        'nominal',
        'status',
        'admin_notes',
    ];

    protected $casts = [
        'nominal' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusLogs()
    {
        return $this->hasMany(StatusLog::class, 'aid_request_id');
    }

    public function finance()
    {
        return $this->hasOne(Finance::class, 'aid_request_id');
    }
}
