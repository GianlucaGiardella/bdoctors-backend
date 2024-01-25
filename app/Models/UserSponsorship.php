<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sponsorship_id',
        'start_date',
        'end_date',
    ];

    protected $table = 'user_sponsorship';
}