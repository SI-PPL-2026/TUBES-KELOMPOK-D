<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'university',
        'student_id',
        'address',
        'profile_photo',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function aidRequests()
    {
        return $this->hasMany(AidRequest::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function finances()
    {
        return $this->hasMany(Finance::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'created_by');
    }

    public function documentations()
    {
        return $this->hasMany(Documentation::class, 'created_by');
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isDonatur(): bool
    {
        return $this->role === 'donatur';
    }

    public function isPenerima(): bool
    {
        return $this->role === 'penerima';
    }
}
