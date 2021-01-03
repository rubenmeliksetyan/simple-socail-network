<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class ProfileRepository
{
    /**
     * @var User
     */
    private $user;

    public function __construct(Authenticatable $user)
    {
        $this->user = $user;
    }

    public function getUserWithApprovedFriends()
    {
        return collect([
            'user' => $this->user,
            'approvedFriends' => $this->user->approvedFriends()->take(9)->get(),
        ]);
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param array $params
     * @return bool
     */
    public function updateUser(array $params)
    {
        return $this->user->update($params);
    }

}
