<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
public function students()
{
    return $this->belongsToMany(Student::class, 'company_student', 'company_id', 'student_id');
}


public function scopeFiltered($query, $schoolYear, $course)
    {
        return $query->where('school_year', $schoolYear)
                     ->where('course', $course);
    }

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', // Example field
        'address', // Example field
        // Add other fields as needed
    ];

    /**
     * Get the vouchers associated with the company.
     */
    public function vouchers()
    {
        return $this->hasMany(Voucher::class, 'company_id', 'id');
    }
}
