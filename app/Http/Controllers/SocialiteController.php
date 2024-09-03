<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function callback()
    {
        $socialUser = Socialite::driver('google')->user();

        Log::info('Google user info:', (array) $socialUser);

        $registeredUser = User::where('google_id', $socialUser->id)->first();

        if (!$registeredUser) {
            $user = User::updateOrCreate([
                'google_id' => $socialUser->id,
            ], [
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => bcrypt(Str::random(16)),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken,
            ]);

            Auth::login($user);
            return redirect('/')->with('success', 'You are Logged in!');
        }

        Auth::login($registeredUser);
        return redirect('/')->with('success', 'You are Logged in!');
    }
}
