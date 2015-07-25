<?php

namespace App\Http\Controllers;

use Flash;
use Auth;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->beforeFilter('guest');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::guest())
        {
            return view('registration.create');
        }
        else
        {
            return redirect('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'username' => 'required|min:6|unique:users',
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ];
        
        $validator = \Validator::make(Input::only('username', 'name', 'email', 'password', 'password_confirmation'));
        
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $confirmation_code = str_random(30);
        
        User::create([
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'name' => Input::get('name'),
            'password' => \Hash::make(Input::get('password')),
            'confirmation_token' => $confirmation_code
        ]);
        
        \Mail::send('emails.verify', compact('confirmation_token'), function($message){
            $message->to(Input::get('email'), Input::get('username'))->subject('SimpleNote - Verify your email address');
        });
        
        Flash::success('Thanks for signing up! Please check your email and follow the link to confirm your account');
        
        return redirect()->route('index');
    }

    public function confirm($confirmation_code)
    {
        if (!$confirmation_code)
        {
            return redirect()->route('home');
        }
        
        $user = User::whereConfirmationToken($confirmation_code)->first();
        
        if (!$user)
        {
            return redirect()->route('home');
        }
        
        $user->confirmed = 1;
        $user->confirmation_token = null;
        $user->save();
        
        $username = $user->username;
        
        \Flash::success('You have successfully verified your account. You can now log in.');
        
        return redirect()->route('login_path', compact('username'));
    }
}
