<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'email',
        'name',
        'surname',
        'text',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
