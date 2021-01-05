<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Friendship statuses
    const FRIENDSHIP_STATUS_APPROVED = 'approved';
    const FRIENDSHIP_STATUS_PENDING = 'pending';
    const FRIENDSHIP_STATUS_REJECTED = 'rejected';
    const FRIENDSHIP_STATUS_NONE = 'none';

    const FRIENDSHIP_STATUS_MAP = [
        0 => self::FRIENDSHIP_STATUS_PENDING,
        1 => self::FRIENDSHIP_STATUS_APPROVED,
        2 => self::FRIENDSHIP_STATUS_REJECTED,
        3 => self::FRIENDSHIP_STATUS_NONE
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *  User all friends
     *
     * @return BelongsToMany
     */
    public function friendship() :BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_friend',
            'sender_id',
            'receiver_id')
            ->withPivot('status');
    }

    /**
     *  User approved friends
     *
     * @return BelongsToMany
     */
    public function approvedFriends() :BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_friend',
            'sender_id',
            'receiver_id')
            ->wherePivot('status', 1);
    }

    /**
     * @param int $id
     * @return string
     */
    public function checkFriendshipStatus(int $id)
    {
        $friend = $this->friendship()->where('id', $id)->first();

        if (!is_null($friend)) {
            return self::FRIENDSHIP_STATUS_MAP[$friend->pivot->status];
        }

        return self::FRIENDSHIP_STATUS_NONE;
    }

}
