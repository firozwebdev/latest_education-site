<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'image', 'currency', 'currency_symbol'];

    public function universities()
    {
        return $this->hasMany(University::class);
    }
}
