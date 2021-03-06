<?php

namespace App\Http\Controllers;
use App\Events\DevCheckedIn;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Response;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;



class SignupController extends Controller
{
    /**
     * Responds to requests to GET /users
     */
    public function getIndex(CookieJar $cookiejar, Request $request)
    {
        //return Auth::user()->email;


        event(new DevCheckedIn(Auth::user()));


        $response = new Response(view('signup')->with(['data'=>Auth::user()]));
        if (Cookie::get('success') !== false) {
            $response->withCookie(Cookie::forget('success'));
            return $response;
        }

        return $response;
//        return view("users");

    }

    /**
     * Responds to requests to POST
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function postIndex(Request $request)
//    {
////        $post_data = Input::all();
//        $new_user = new User;
//        $validator = Validator::make($request->all(), [
//            'name' => 'required',
//            'email' => 'required|unique:users',
//        ]);
//        if ($validator->fails()) {
//            return redirect('/')
//                ->withErrors($validator)
//                ->withInput();
//        }
//        if (!str_contains($request->name, '@')) {
//            $new_user->name = $request->name;
//        }
//        else {
//            $new_user->name = $request->nickname;
//
//        }
//        $new_user->email = $request->email;
//
//        $new_user->save();
//
//        $response = new Response(redirect('/'));
//
//        $response->withCookie(cookie('entrysuccess', true, 3600));
//
//        return $response;
//
//
//    }


}