<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Flash;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->beforeFilter('guest', ['except' => 'destroy']);
        $this->beforeFilter('auth', ['only' => 'destroy']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $username = Input::get('username', '');
        return view('sessions.create', compact('username'));
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
            'username' => 'required|exists:users',
            'password' => 'required'
        ];
        
        $validator = \Validator::make(Input::only('username', 'password'));
        
        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $credentials = [
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'confirmed' => 1
        ];
        
        if (!Auth::attempt($credentials))
        {
            return redirect()->back()->withInput()->withErrors(['credentials' => 'We were unable to log you in']);
        }
        
        Flash::message('Welcome back!');
        
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
