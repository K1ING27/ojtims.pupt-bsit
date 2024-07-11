<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    
    protected $table = 'vouchers';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'company_id', // Assuming this is the foreign key to Company
        'code',       // Example field
        'amount',     // Example field
        // Add other fields as needed
    ];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class, 'id', 'company_id');
    }
    
}
