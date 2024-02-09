<?php

namespace App\Models;


use App\Models\User;
use App\Models\Vote;
use App\Models\Review;
use App\Models\Message;
use App\Models\Sponsorship;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'curriculum',
        'photo',
        'phone',
        'service',
        'visible',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }

    public function votes()
    {
        return $this->belongsToMany(Vote::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
