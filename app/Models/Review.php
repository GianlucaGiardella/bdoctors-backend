<?php

namespace App\Models;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vote_id',
        'first_name',
        'last_name',
        'text',
    ];

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }
}