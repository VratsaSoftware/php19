<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
    	//TO DO PASS USER NAME
    	$profile = Profile::find($user)->first();
    	
    	return view('profiles.index', compact('profile', 'user'));
    }
}
