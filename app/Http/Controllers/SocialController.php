<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $users = User::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            Auth::login($users);
            return redirect('/');
        } else {
            try {
                $user = User::create([
                    'name' => $userSocial->getName(),
                    'email' => $userSocial->getEmail(),
                    'provider_id' => $userSocial->getId(),
                    'provider' => $provider,
                    'password' => bcrypt('secret'),
                    'state' => 'provider',
                    'country' => 'provider',
                    'o_auth' => 'secret',
                    'city' => 'city',
                    'phone' => '',
                    'dob' => '',
                    'address' => '',
                ]);
                $user->assignRole('user');
                return redirect()->back();
            }
            catch(\Execption $e){
                return redirect()->back();
            }

        }
    }
}
