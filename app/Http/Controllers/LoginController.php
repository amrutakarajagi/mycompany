<?php

namespace App\Http\Controllers;

use Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
var_dump($user->getId());
var_dump($user->getNickname());
var_dump($user->getNickname());
var_dump($user->getName());
var_dump($user->getName());
var_dump($user->getName());
var_dump($user->getEmail());
var_dump($user->getAvatar());

        // return $user->token;
        // $user->token;
    }
}