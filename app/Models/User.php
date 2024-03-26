<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'username',
        'avatar',
        'language_id',
        'bio',
        'sm_instagram',
        'sm_linkedin',
        'sm_twitter',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function contributions()
    {
        return $this->hasMany(Contribution::class, 'author_id');
    }

    public function stories()
    {
        return $this->hasMany(Story::class, 'author_id');
    }

    /**
     * Returns a default avatar if the avatar column is null.
     * Helps us avoid having to make repetitive conditional checks in our Blade views.
     */
    public function getAvatarAttribute($value)
    {
        return $value ?: 'user.jpg';
    }
}
