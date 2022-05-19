<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function redirectFacebook($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callbackFacebook($provider){
        try {
            $facebookUser = Socialite::driver($provider)->user();
            $findUser = User::where('email', $facebookUser->email)->first();

            if($findUser) {
                Auth::login($findUser);
                return redirect()->intended('productos');
            }else{
                $newUser = User::create([
                    'name' => $facebookUser->name,
                    'rol' => 'admin',
                    'email' => $facebookUser->email,
                    'password' => encrypt('12345678')
                ]);
                Auth::login($newUser);
                return redirect()->intended('productos');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
