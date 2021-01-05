<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\FriendshipService;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{


    /**
     * [Route("/friendship/{sender:id}/{receiver}/send", methods: ["POST"])]
     *
     * @param FriendshipService $service
     * @param User $sender
     * @param User $receiver
     */
    public function sendFriendRequest(
        FriendshipService $service,
        User $sender,
        User $receiver
    )
    {
        if ($sender->friendship->contains($receiver->id)) {
            return response()->json([
                'message' => 'You are already friends',
                'success' => false
            ]);
        }
        $status = array_search(User::FRIENDSHIP_STATUS_PENDING, User::FRIENDSHIP_STATUS_MAP);

        $service->sendFriendRequest($sender, $receiver, $status);

        return response()->json([
            'message' => 'Friend request send',
            'success' => true
        ]);

    }

    /**
     *  [Route("/friendship/{sender:id}/{receiver}/approve", methods: ["POST"])]
     *
     * @param FriendshipService $service
     * @param User $sender
     * @param User $receiver
     */
    public function approveFriendRequest(
        FriendshipService $service,
        User $sender,
        User $receiver
    )
    {
        $status = array_search(User::FRIENDSHIP_STATUS_APPROVED, array_keys(User::FRIENDSHIP_STATUS_MAP));;
        $service->updateFriendship($sender, $receiver, $status);

        return response()->json([
            'message' => 'Friendship approved',
            'success' => true
        ]);
    }

    /**
     * [Route("/friendship/{sender:id}/{receiver}/reject", methods: ["POST"])]
     *
     * @param FriendshipService $service
     * @param User $sender
     * @param User $receiver
     */
    public function rejectFriendRequest(
        FriendshipService $service,
        User $sender,
        User $receiver
    )
    {
        $status = array_search(User::FRIENDSHIP_STATUS_REJECTED, array_keys(User::FRIENDSHIP_STATUS_MAP));
        $service->updateFriendship($sender, $receiver, $status);

        return response()->json([
            'message' => 'Friendship rejected',
            'success' => true
        ]);


    }

    /**
     * [Route("/friendship/{receiver:id}/unfriend", methods: ["POST"])]
     *
     * @param FriendshipService $service
     * @param User $receiver
     */
    public function unfriend(
        FriendshipService $service,
        User $receiver
    )
    {
        if (!Auth::user()->friendship->contains($receiver->id)) {
            return response()->json([
                'message' => 'You are not friends',
                'success' => false
            ]);
        }
        $service->unfriend(Auth::user(), $receiver);
        return response()->json([
            'message' => 'Unfriended',
            'success' => true
        ]);
    }


}
