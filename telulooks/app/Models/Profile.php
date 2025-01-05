<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profil';

    protected $fillable = [
        'username',
        'name',
        'email',
        'bio',
        'interest',
        'profile_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }

    public function getInterestsArrayAttribute()
    {
        return $this->interest ? explode(',', $this->interest) : [];
    }

    public function getProfileImageUrlAttribute()
    {
        if ($this->profile_image) {
            return asset('storage/profile/' . $this->profile_image);
        }
        return 'https://i.imgur.com/bDLhJiP.jpg';
    }
}
