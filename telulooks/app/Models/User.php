<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * The data type of the primary key
     *
     * @var string
     */
    public $keyType = 'string';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        'nama',
        'email',
        'username',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the profile associated with the user.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class, 'username', 'username');
    }

    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_user', 'id_user');
    }

    /**
     * Get the wishlists associated with the user.
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'id_user', 'id_user');
    }

    /**
     * Generate next ID for user
     */
    public static function generateNextId()
    {
        $lastUser = self::orderBy('id_user', 'desc')->first();
        if (!$lastUser) {
            return 'us001';
        }

        $lastId = (int) substr($lastUser->id_user, 2);
        $nextId = $lastId + 1;

        return 'us' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    }
}
