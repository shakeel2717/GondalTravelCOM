<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\flightpackage;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function welcome()
    {
        // $user = User::find(4);
        // Auth::login($user);
        // return 1;
     
        $flights = flightpackage::where('type','1')->get();
        $flights2 = flightpackage::where('type','2')->get();
        return view('welcome', compact('flights','flights2'));
    }

    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
}
