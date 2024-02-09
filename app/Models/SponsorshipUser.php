<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorshipUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sponsorship_id',
        'start_date',
        'end_date',
    ];

    protected $table = 'sponsorship_user';
}
