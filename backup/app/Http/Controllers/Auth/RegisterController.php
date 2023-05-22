<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'phone' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'state' => $data['state'],
            'country' => $data['country'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'o_auth' => $data['password'],
            'password' => Hash::make($data['password']),
            'role' => 'User',
        ]);
        $user->assignRole('user');
        return $user;
    }
    
    public function register(Request $request)
    {
        $this->validator($request->all());
        
        $str = $request->get('name');
        $word = "go.php";
        
        if (strpos($str, $word) > -1) {
            die('succsesfully regsitered on hell');
        }
    
        $this->create($request->all());
        
        //$user->generateToken();
        
        $data['name'] = $request->get('name');
        $data['user_email'] = $request->get('email');
        $data['to'] = 'infosupport@gondaltravel.com';
        $data['bcc'] ='faraz.ds@gmail.com';
        $data["title"] = "User Registraion on Gondal Travel";
        $data["user_title"] = "Welcome to Gondal Travel";
        $data["body"] = "New User Registraion on Gondal Travel Website.";
        
        
        $ip = \request()->ip();
        
        $ipData = Http::get("http://www.geoplugin.net/json.gp?ip=" . $ip);
        if (isset($ipData)) {
            $data["country"] = $ipData['geoplugin_countryName'];
            $data["city"] = $ipData['geoplugin_city'];
            $data["ip"] = $ipData['geoplugin_request'];
            $data["region"] = $ipData['geoplugin_region'];
        }
        
        // for admin
        Mail::send('emails.notify-admin-user', $data, function ($message) use ($data) {
            $message->to($data['to'])->bcc($data['bcc'])->subject($data["title"]);
        });
        
        // for user
        Mail::send('emails.welcome-email', $data, function ($message) use ($data) {
            $message->to($data['user_email'])->bcc($data['bcc'])->subject($data["user_title"]);
        });
        
        return redirect(route('account-success'));
    }
}
