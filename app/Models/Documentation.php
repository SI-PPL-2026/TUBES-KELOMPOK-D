<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    protected $table = 'documentations';

    protected $fillable = [
        'title',
        'image_path',
        'description',
        'created_by',
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
