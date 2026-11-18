<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidRequest extends Model
{
    use HasFactory;

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
        return $this->hasMany(StatusLog::class)->orderBy('created_at', 'desc');
    }

    public function finance()
    {
        return $this->hasOne(Finance::class);
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'pending' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800"><i class="fa-solid fa-clock mr-1"></i> Menunggu Verifikasi</span>',
            'verified' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800"><i class="fa-solid fa-user-check mr-1"></i> Terverifikasi</span>',
            'approved' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800"><i class="fa-solid fa-circle-check mr-1"></i> Disetujui</span>',
            'completed' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800"><i class="fa-solid fa-check-double mr-1"></i> Telah Disalurkan</span>',
            'rejected' => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-100 text-rose-800"><i class="fa-solid fa-circle-xmark mr-1"></i> Ditolak</span>',
            default => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">' . ucfirst($this->status) . '</span>',
        };
    }
}
