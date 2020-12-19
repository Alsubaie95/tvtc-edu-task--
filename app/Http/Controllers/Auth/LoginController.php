<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *

     * @return  App\Http\Controllers\Auth\LoginController;
     */
    public function handleProviderCallback()
    {
        $userSoical = Socialite::driver('facebook')->user();

        //  dd($user);

        $userSoical=User::where('email',$userSoical->email)->first();
        if($userSoical){
            Auth::login($userSoical);
            return redirect('/home');
        }else{
            $data= new User;
            $data->national=$userSoical->email;
            $data->password=bcrypt('1234567');
            $data->save();

            Auth::login($data);
            return redirect('/home');
        }

    }
}
