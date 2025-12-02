<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'review',
        'description',
        'name',
        'image',
        'degree_name',
        'university_id',
    ];

    public function university()
    {
        return $this->belongsTo(\App\Models\University::class);
    }
}
