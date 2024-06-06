<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination', 'distance'
    ];

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
