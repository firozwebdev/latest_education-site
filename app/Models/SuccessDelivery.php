<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessDelivery extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'youtube_link'];
}
