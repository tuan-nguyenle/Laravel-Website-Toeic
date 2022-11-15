<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
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
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user_email = User::where('email', $google_user->email)->first();
            $user_googleID = User::where('google_id', $google_user->id)->first();
            if (!$user_email) {
                $new_user = User::create([
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'image' => $google_user->avatar,
                    'google_id' => $google_user->id,
                    'password' => Hash::make($this->RandomString()),
                ]);
                Auth::login($new_user);
                return redirect()->intended('dashboard');
            }
            if (!$user_googleID) {
                $user_email->update(['google_id' => $google_user->id]);
            }
            Auth::login($user_email);
            return redirect()->intended('dashboard');
        } catch (\Throwable $th) {
            dd("Something went wrong" . $th->getMessage());
        }
    }
}
