<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    /**
     * [Route("/profile/", methods: ["GET"])]
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = User::find(Auth::id());

        return view('profile.index', compact('user'));
    }

    /**
     *  [Route("/profile/edit", methods: ["GET"])]
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    /**
     * [Route("/profile/{user:id}/show", methods: ["GET"])]
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(User $user)
    {
        if (Auth::id() == $user->id) {
            return redirect()->route('profile.index');
        }

        $user->friendshipStatus = Auth::user()->checkFriendshipStatus($user->id);

        return view('profile.show', compact('user'));
    }

    /**
     *  [Route("/profile/update", methods: ["PUT"])]
     *
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request)
    {
        if (Auth::user()->update($request->all())) {
            Session::flash('message', 'User has been updated');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Oops something want wrong');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route('profile.index');

    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\View
     */
    public function friendsList(User $user)
    {
        return view('profile.friends_list', compact('user'));
    }

}
