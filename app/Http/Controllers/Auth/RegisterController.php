<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function registration()
    {
        if (Auth::check())
            return redirect()->back();
        
        $check_email = User::where('email', Input::get('email'))->first();
        if ($check_email == NULL) {
            \App\Alert::error('Email già presente nel nostro database');
            return redirect()->back();
        }
        
        $user = new \App\User;
        $user->name = Input::get('name'). ' '. Input::get('surname');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('pass1'));
        $user->occupation = Input::get('occupation');
        $user->ip = request()->ip();
        $user->save();
        
        $profile = new \App\Profile;
        $profile->name = Input::get('name');
        $profile->surname = Input::get('surname');
        $profile->gender = Input::get('gender');
        $profile->save();
        
        Auth::login($user, true);
        \App\Alert::success('Registrazione completata');
        return redirect()->back();
    }
    
}
