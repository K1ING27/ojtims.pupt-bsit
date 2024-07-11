<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'course', 'course');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'adviser_name', 'full_name');
    }
}
 