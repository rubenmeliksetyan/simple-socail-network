<?php

namespace App\Repositories;

interface PostRepositoryInterface
{

    /**
     * @param array $friendsIds
     * @param int $paginate
     * @return mixed
     */
    public function getAllVisiblePosts(array $friendsIds, int $paginate);


    /**
     * @param int $userId
     * @param int $paginate
     * @return mixed
     */
    public function getFriendVisiblePosts(int $userId, int $paginate);


    /**
     * @param int $userId
     * @param int $paginate
     * @return mixed
     */
    public function getUserAllPosts(int $userId, int $paginate);



}