<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'uploader_name', 'full_name');
    }
}
