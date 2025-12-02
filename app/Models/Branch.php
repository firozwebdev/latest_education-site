<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_name',
        'branch_location',
        'phone',
        'email',
        'country_id',
        'map_images',
    ];

    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);
    }
}
