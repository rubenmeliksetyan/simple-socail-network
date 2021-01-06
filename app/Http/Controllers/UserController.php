<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     *  [Route("/users/", methods: ["GET"])]
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request){

        if($request->ajax()) {

            $users = User::where('name', 'LIKE', $request->input('name').'%')
                ->get();

            $output = '';

            if (count($users) > 0) {
                $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 1">';
                foreach ($users as $user){
                    $output .= '<li class="list-group-item"><a href="'.route('profile.show', $user->id).'">'
                    .$user->name.'
                    </a></li>';
                }
                $output .= '</ul>';
            }
            else {

                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }

            return response()->json(['output' => $output]);
        }
    }
}
