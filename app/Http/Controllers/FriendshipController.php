<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\FriendRequestNotification;
use App\Services\FriendshipService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        if ($sender->friends->contains($receiver->id)) {
            return response()->json([
                'message' => 'You are already friends',
                'success' => false
            ]);
        }
        $status = array_search(User::FRIENDSHIP_STATUS_PENDING, User::FRIENDSHIP_STATUS_MAP);

        $service->sendFriendRequest($sender, $receiver, $status);

        $receiver->notify(new FriendRequestNotification($sender));

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function approveFriendRequest(
        FriendshipService $service,
        User $sender,
        User $receiver,
        Request $request
    )
    {
        $status = array_search(User::FRIENDSHIP_STATUS_APPROVED, User::FRIENDSHIP_STATUS_MAP);
        $service->updateFriendship($sender, $receiver, $status);

        $receiver->notifications()->where('id', $request->input('notification_id'))->update(['read_at' => now()]);

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function rejectFriendRequest(
        FriendshipService $service,
        User $sender,
        User $receiver,
        Request $request
    )
    {
        $status = array_search(User::FRIENDSHIP_STATUS_REJECTED, User::FRIENDSHIP_STATUS_MAP);
        $service->updateFriendship($sender, $receiver, $status);

        $receiver->notifications()->where('id', $request->input('notification_id'))->update(['read_at' => now()]);

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
        $sender = User::find(Auth::id());
        if ($sender->approvedFriends->contains($receiver->id)) {
           $success = $service->unfriend($sender, $receiver);
        } else {
            $success = $service->unfriend($receiver, $sender);
        }
        return response()->json([
            'message' => 'Unfriended',
            'success' => (boolean) $success
        ]);
    }


}
