<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EController extends Controller
{
    //create function
    public function create()
    {
    	return view('e.create');
    }

    // store function
    public function store()
    {
    	$this->validate(request(), [
    		'pnom' => 'required',
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	$user = User::create(request(['fname', 'lname', 'email', 'password']));

    	auth()->login($user);

    	return redirect()->to('dash');
    }
}
