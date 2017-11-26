<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class UsersController extends Controller {

	public function register() {

		return view('users.register');
	}
    
    public function store(Request $request) {

    	$validateUser = $request->validate([
    		'name' => 'required',
    		'email' => 'required|unique:users',
    		'password' => 'required',
    		'password_confirmation' => 'required'
    	]);

    	$user = User::create([
    		'name' => $request->input('name'),
    		'email' => $request->input('email'),
    		'password' => Hash::make($request->input('password')),
    		'role_id' => '1'
    	]);

    	if($user) {

    		$att = Auth::attempt([
    			'email' => $request->input('email'),
    			'password' => $request->input('password')
    		], 1);

    		if(Auth::check())
    			return view('home');
    		else
    			if(!$att)
    				echo 'false ';
    			return 'registerd but not loged in ';
    	} else {

    		return 'failed to register the user';
    	}
    	// return $request->input('name');
    }

    public function login(){
    	return view('users.login');
    }

    public function authenticate(Request $request) {

    	$remember = false;
    	if($request->input('remember'))
    		$remember = true;
    	
    	$validateUser = $request->validate([

			'email' => 'required',
    		'password' => 'required'
    	]);

    	if(Auth::attempt([

    		'email' => $request->input('email'),
    		'password' => $request->input('password')

    	])) {
    		return view('home');
    	}

    	return 'login failed';
    }

    public function logout() {

    	Auth::logout();
    	if(!Auth::check()) {
    		return view('welcome');
    	}

    	return 'the logout did not work';
    }

    
}