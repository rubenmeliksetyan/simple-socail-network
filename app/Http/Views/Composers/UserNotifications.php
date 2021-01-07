<?php

namespace App\Http\Views\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserNotifications
{
    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {
        return $view->with('notifications',  Auth::user()->unreadNotifications);
    }

}