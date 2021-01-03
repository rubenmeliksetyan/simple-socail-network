<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    /**
     * [Route("/profile/", methods: ["GET"])]
     *
     * @param ProfileRepository $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(ProfileRepository $user)
    {
        return view('profile.index', ['profileData' => $user->getUserWithApprovedFriends()]);
    }

    /**
     *  [Route("/profile/edit", methods: ["GET"])]
     *
     * @param ProfileRepository $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ProfileRepository $user)
    {
        return view('profile.edit', ['user' => $user->getUser()]);
    }


    /**
     *  [Route("/profile/update", methods: ["PUT"])]
     *
     * @param UserUpdateRequest $request
     * @param ProfileRepository $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, ProfileRepository $user)
    {
        if ($user->updateUser($request->all())) {
            Session::flash('message', 'User has been updated');
            Session::flash('alert-class', 'alert-success');
        } else {
            Session::flash('message', 'Oops something want wrong');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route('profile.index');

    }

}
