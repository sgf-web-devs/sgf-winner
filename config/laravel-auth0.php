<?php

return array(

    /*
    |--------------------------------------------------------------------------
    |   Your auth0 domain
    |--------------------------------------------------------------------------
    |   As set in the auth0 administration page
    |
    */

     'domain'        => 'sgfwebdevs.auth0.com',
    /*
    |--------------------------------------------------------------------------
    |   Your APP id
    |--------------------------------------------------------------------------
    |   As set in the auth0 administration page
    |
    */

     'client_id'     => env('AUTH0_CLIENT_ID'),

    /*
    |--------------------------------------------------------------------------
    |   Your APP secret
    |--------------------------------------------------------------------------
    |   As set in the auth0 administration page
    |
    */
     'client_secret' => env('AUTH0_SECRET'),


   /*
    |--------------------------------------------------------------------------
    |   The redirect URI
    |--------------------------------------------------------------------------
    |   Should be the same that the one configure in the route to handle the
    |   'Auth0\Login\Auth0Controller@callback'
    |
    */

     'redirect_uri'  => env('AUTH0_REDIRECT_URI'),
    /*
   ,|--------------------------------------------------------------------------
    |   Persistence Configuration
    |--------------------------------------------------------------------------
    |   persist_user            (Boolean) Optional. Indicates if you want to persist the user info, default true
    |   persist_access_token    (Boolean) Optional. Indicates if you want to persist the access token, default false
    |   persist_id_token        (Boolean) Optional. Indicates if you want to persist the id token, default false
    |
    */

     'persist_user' => true,
     'persist_access_token' => true,
     'persist_id_token' => true,

);
