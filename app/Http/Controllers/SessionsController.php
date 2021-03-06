<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    // create function
    public function create()
    {
    	return view('sessions.create');
    }

    // store funciton
    public function store()
    {
    	if(auth()->attempt(request(['email', 'password'])) == false)
    	{
    		return back()->withErrors([
    			'message' => 'The email or password is incorrect, please try again'
    		]);
    	}

    	return redirect()->to('/dash');
    }

    // destroy function
    public function destroy()
    {
    	auth()->logout();
    	return redirect()->to('dash');
    }
}
