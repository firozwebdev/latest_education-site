<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'university_name',
        'student_level',
        'duration',
        'next_intake',
        'tuition_fees',
        'scholarship',
        'ielts_score',
        'website_url',
        'description',
        'global_rank',
        'in_country_rank',
        'location',
        'logo',
        'university_image',
        'university_wise_course',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function courses()
    {
        return $this->hasMany(\App\Models\Course::class);
    }
}
