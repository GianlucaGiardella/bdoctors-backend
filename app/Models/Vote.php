<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}