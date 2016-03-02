<?php

use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//
//Route::group(['middleware' => ['web']], function () {
//
//});

Route::group(['middleware' => 'web'], function () {
    Route::get('/auth0/callback', 'Auth0Controller@callback');
    Route::auth();

    Route::get('/', function(){
        if(Auth::check()) {
            event(new DevCheckedIn(Auth::user()));
        }


        return view("signup", ['data' => Auth::user()]);
    });

    Route::controller('users', 'UserController');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('');
    });

});


class DevCheckedIn implements ShouldBroadcast
{
    use SerializesModels;

    public $user;

    public function __construct(\Auth0\Login\Auth0User $user)
    {
        $this->user = [
            'name' => $user->name,
            'email' => $user->email,
            'picture' => $user->picture,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at
        ];
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['sgf-channel'];
    }
}