<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'content',
        'event_name',
        'date',
        'time',
        'location_name',
        'details_description',
        'single_page_view',
    ];
}
