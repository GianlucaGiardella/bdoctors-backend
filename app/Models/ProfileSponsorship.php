<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileSponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'sponsorship_id',
        'start_date',
        'end_date',
    ];

    protected $table = 'profile_sponsorship';
}
