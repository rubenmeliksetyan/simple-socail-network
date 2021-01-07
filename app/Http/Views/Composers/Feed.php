<?php

namespace App\Http\Views\Composers;

use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class Feed
{

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * Feed constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {
        $currentUser = Auth::user();
        $posts = [];
//        dd(Route::current()->getName());
        switch (Route::current()->getName()) {
            case 'home':
                $friendsIds = $currentUser->friends->pluck('id')->toArray();
                $posts = $this->postRepository->getAllVisiblePosts($friendsIds,
                    \request()->input('paginate', config('constants.posts_pagination_count'))
                );
                break;
            case 'profile.show':
                $userId = Route::current()->parameter('user')->id;
                if ($currentUser->friends->contains($userId)) {
                    $posts = $this->postRepository->getFriendVisiblePosts($userId,
                        \request()->input('paginate', config('constants.posts_pagination_count'))
                    );
                }
                break;
            case 'profile.index':
                $posts = $this->postRepository->getUserAllPosts($currentUser->id,
                    \request()->input('paginate', config('constants.posts_pagination_count'))
                );
                break;
        }

        return $view->with('posts', $posts);

    }

}