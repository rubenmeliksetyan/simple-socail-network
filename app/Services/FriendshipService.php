<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class FriendshipService implements FriendshipInterface
{
    /**
     * @param User $sender
     * @param User $receiver
     * @param int $status
     * @return bool|mixed
     */
    public function sendFriendRequest(User $sender, User $receiver, int $status)
    {
        $sender->friends()->attach($receiver, ['status' => $status]);
    }

    /**
     * @param User $sender
     * @param User $receiver
     * @param int $status
     * @return mixed
     */
    public function updateFriendship(User $sender, User $receiver, int $status)
    {
        $friendship = $sender->friends()->where('receiver_id', $receiver->id)->first();
        return $friendship->pivot->update(['status' => $status]);

    }

    /**
     * @param User $user
     * @param User $receiver
     * @return mixed|void
     */
    public function unfriend(User $user, User $receiver)
    {
        return $user->friends()->detach($receiver);
    }
}
