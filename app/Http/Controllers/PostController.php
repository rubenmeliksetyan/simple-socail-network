<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * [Route("/post/create", methods: ["GET"])]
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * [Route("/post/{user:id}/store", methods: ["POST"])]
     *
     * @param User $user
     * @param PostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(User $user, PostRequest $request)
    {
        $user->posts()->create($request->all());

        return redirect()->route('profile.index');

    }

    /**
     *  [Route("/post/{post:id}/edit", methods: ["GET"])]
     *
     * @param Post $post
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     *  [Route("/post/{post:id}/update", methods: ["PUT"])]
     *
     * @param PostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->all());
        return redirect()->route('profile.index');

    }

    /**
     *  [Route("/post/{post:id}/destroy", methods: ["DELETE"])]
     *
     * @param Post $post
     * @return  \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $success = $post->delete();

        return response()->json([
            'message' => 'post has been deleted',
            'success' => $success
        ]);

    }

}
