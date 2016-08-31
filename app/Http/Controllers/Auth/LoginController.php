<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input as Input;
use App\User as User;
use App\Profile as Profile;
use App\Alert as Alert;
use Illuminate\Support\Facades\Auth as Auth;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    public function ajax_login()
    {
        $user = Input::get('user');
        $pass = Input::get('pass');
        if (Auth::attempt(['email' => $user, 'password' => $pass])) {
            // Authentication passed...
            Alert::success('Connessione effettuata con successo');
            return 'ok';
        } else {
            return 'error';
        }
    }
    
    public function facebook_login()
    {
        if (!Input::has('response'))
            return 'no';
        
        $fbID = Input::get('response.id');
        
        // check if user is already registered with Facebook
        $users = User::where('fb_id', $fbID)->get();
        
        if (!$users->isEmpty()) {
            $user = $users->first();
        }
        else  {
            
            // create new User object
            $user = new User;
            
            if (Input::has('response.first_name') && Input::has('response.last_name'))
                $user->name = Input::get('response.first_name') . ' ' . Input::get('response.last_name'); 
            if (Input::has('response.email'))
                $user->email = Input::get('response.email');
            if (Input::has('response.id'))
                $user->fb_id = Input::get('response.id');
            if (Input::has('response.work'))
                $user->occupation = Input::get('response.work');
            if (Input::has('response.picture.data.url'))
                $user->fb_picture = Input::get('response.picture.data.url');
            $user->ip = request()->ip();
            // save to DB
            $user->save();
            
            // assign role Customer
            $user->assignRole('customer');
            
            // save relative profile - create new Profile object
            $profile = new Profile;
            $profile->user_id = $user->id;
            if (Input::has('response.first_name'))
                $profile->name = Input::get('response.first_name');
            
            if (Input::has('response.last_name'))
                $profile->surname = Input::get('response.last_name');
            
            if (Input::has('response.birthday'))
                $profile->birthdate = Input::get('response.birthday');
            // save to DB
            $profile->save();
        }
        
        // update IP address
        $user->ip = request()->ip();
        $user->save();
        // authorize and login user
        Auth::loginUsingId($user->id, true);
    
        // success message
        Alert::success('Connessione effettuata con successo');
        // redirect back
        return 'ok';
    }
}
