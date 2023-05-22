<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GooglesController extends Controller
{
    public function next()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $siteUser = User::where('email', $user->email)->first();
        if ($siteUser){
            Auth::loginUsingId($siteUser->id);
            return redirect(route('fronts.index'));
        }else{
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => now(),
                'password' => Hash::make('amir1212')
            ]);

            Auth::loginUsingId($newUser->id);
            return redirect(route('fronts.index'));
        }
    }
}
