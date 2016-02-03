<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;


class UserController extends Controller
{
    /**
     * Responds to requests to GET /users
     */
    public function getIndex()
    {
        return view("users");
    }

    /**
     * Responds to requests to POST
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postIndex(Request $request)
    {
//        $post_data = Input::all();

        $new_user = new User;
//        git
        $new_user->name = $request->name;
        $new_user->email = $request->email;

        $new_user->save();

        return view("success");

        //
    }

    /**
     * Responds to requests to POST
     */
    public function getList()
    {
        $users = User::All();

        return view("userlist")->with(array('users' => $users));
        //
    }

    /**
     * Responds to requests to POST
     */
    public function getWinners()
    {
        $winners = User::All()->random(2);

        return view("winner")->with(array('users' => $winners));
        //
    }
}