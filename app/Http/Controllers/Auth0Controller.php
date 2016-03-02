<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth0\Login\Contract\Auth0UserRepository;

use App\Http\Requests;
use App\User;

class Auth0Controller extends Controller
{
    /**
     * @var Auth0UserRepository
     */
    protected $userRepository;

    public function __construct(Auth0UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Callback action that should be called by auth0, logs the user in
     */
    public function callback()
    {
        // Get a handle of the Auth0 service (we don't know if it has an alias)
        $service = \App::make('auth0');

        // Try to get the user information
        $profile = $service->getUser();

        // Get the user related to the profile
        $auth0User = $this->userRepository->getUserByUserInfo($profile);

        if ($auth0User) {
            if (!str_contains($auth0User->name, '@')) {
                $name = $auth0User->name;
            }
            else {
                $name = $auth0User->nickname;

            }

            // If we have a user, we are going to log him in, but if
            // there is an onLogin defined we need to allow the Laravel developer
            // to implement the user as he wants an also let him store it.
            $flight = User::firstOrCreate([
                'github_id' => $auth0User->user_id,
                'email' => $auth0User->email,
                'picture' => $auth0User->picture,
                'name' => $name,
            ]);


            if ($service->hasOnLogin()) {
                $user = $service->callOnLogin($auth0User);
            } else {
                // If not, the user will be fine
                $user = $auth0User;
            }
            \Auth::login($user);
        }
        return \Redirect::intended('/');
    }
}
