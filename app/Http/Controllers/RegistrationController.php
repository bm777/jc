<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //create function
    public function create()
    {
    	return view('registration.create');
    }

    // store function
    public function store()
    {
    	$this->validate(request(), [
    		'fname' => 'required',
    		'lname' => 'required',
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	$user = User::create(request(['fname', 'lname', 'email', 'password']));

    	auth()->login($user);

    	return redirect()->to('login');
    }
}
