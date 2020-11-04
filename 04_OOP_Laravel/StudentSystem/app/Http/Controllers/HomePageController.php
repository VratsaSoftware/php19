<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function index()
    {
    	$user = Auth::user();
        
    	return view('home_page', compact('user'));
    }
}
