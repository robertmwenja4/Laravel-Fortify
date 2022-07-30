<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    public function redirectToGithubCallback()
    {
        $user = Socialite::driver('github')->user();
        $this->_registerOrLogin($user);
        return redirect()->route('home');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function redirectToFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->_registerOrLogin($user);
        return redirect()->route('home');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLogin($user);
        return redirect()->route('home');
    }


    protected function _registerOrLogin($data)
    {

        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($user);
    }
}
