<?php

namespace App\Http\Controllers;
use App\Events\DevCheckedIn;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Response;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function getIndex()
    {
        //$time = Carbon::now()->addSeconds(3);
        $time = new Carbon('first wednesday of this month 6:30PM CST');

        if(Carbon::now() > $time) {
            $time = new Carbon('first wednesday of next month 6:30PM CST');
        }

        $users = User::All();

        $data = [
            'users' => $users,
            'time' => $time,
            'quip' => '70kKRJqY',
        ];

        return view("userlist", $data);
    }

    public function getWinners()
    {
        $winners = User::All()->random(3);

        return view("winner")->with(array('users' => $winners));
    }

    public function getAll()
    {
        $users = User::All();
        return $users;
    }
}