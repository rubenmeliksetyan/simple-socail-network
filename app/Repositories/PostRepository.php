<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @param array $friendsIds
     * @param int $paginate
     * @return mixed
     */
    public function getAllVisiblePosts(array $friendsIds,int $paginate)
    {
        return Post::whereIn('user_id', $friendsIds)->where('is_visible', true)->with('user')->paginate($paginate);
    }

    /**
     * @param int $userId
     * @param int $paginate
     * @return mixed
     */
    public function getFriendVisiblePosts(int $userId, int $paginate)
    {
        return Post::where('user_id', $userId)->where('is_visible', true)->with('user')->paginate($paginate);
    }

    public function getUserAllPosts(int $userId, int $paginate)
    {
        return Post::where('user_id', $userId)->paginate($paginate);
    }

}