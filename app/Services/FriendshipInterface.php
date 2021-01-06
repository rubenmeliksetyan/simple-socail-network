<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

interface FriendshipInterface
{
    /**
     * @param User $sender
     * @param User $receiver
     * @param int $status
     * @return mixed
     */
    public function updateFriendship(User $sender, User $receiver, int $status);

    /**
     * @param User $sender
     * @param User $receiver
     * @param int $status
     * @return mixed
     */
    public function sendFriendRequest(User $sender, User $receiver, int $status);

    /**
     * @param User $user
     * @param User $receiver
     * @return mixed
     */
    public function unFriend(User $user, User $receiver);

}
