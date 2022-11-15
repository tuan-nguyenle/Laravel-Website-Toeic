<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring = $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->user();
            $user_facebookID = User::where('facebook_id', $facebook_user->id)->first();
            $user_gmail = User::where('email', $facebook_user->email)->first();
            if (!$user_gmail) {
                $new_user = User::create([
                    'name' => $facebook_user->name,
                    'email' => $facebook_user->email,
                    'image' => $facebook_user->avatar,
                    'facebook_id' => $facebook_user->id,
                    'password' => Hash::make($this->RandomString()),
                ]);
                Auth::login($new_user);
                return redirect()->intended('dashboard');
            }
            if (!$user_facebookID) {
                $user_gmail->update(['facebook_id' => $facebook_user->id]);
            }
            Auth::login($user_gmail);
            return redirect()->intended('dashboard');
        } catch (\Throwable $th) {
            dd("Something went wrong" . $th->getMessage());
        }
    }
}
