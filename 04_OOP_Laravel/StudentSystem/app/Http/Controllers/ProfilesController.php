<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
    	
    	$profile = Profile::find( $user )->first();
        
    	$courses = User::find( $user->id )
    		->courses()
    		->orderBy('course_name')
    		->get();
    	

    	return view('profiles.index', compact('profile', 'user', 'courses'));
    }

    public function edit( Profile $profile )
    {
        $profile = Profile::find( $profile )->first();
        $user_data = $profile->user;

       return view('profiles.edit', compact( 'profile', 'user_data' ) );
    }

    public function update( Request $request, Profile $profile )
    {
        //dd($request->file('image'));

        //get from $_FILES
        $file = $request->file('image');      
        
        //input type text, name = file
        // $file = $request->file;

        // Storage::put('public/file.jpg', $file);
        
        // dd($file);          
        // $file = 'text';
        //creates new file, must have a file content
        // Storage::put('public/file.doc', $file );
        
        // $path = $request->file('image')->store('user_images');


        // // $path = Storage::putFile('user_images', $request->file('image'));
       
        $ext = $request->file('image')->getClientOriginalExtension();

        $path = $request->file('image')
            ->storeAs('public/user_images', $request->user()->name .'.' . $ext);
        
        $profile = Profile::find( $profile )->first();

        $profile->image = 'user_images/' . $request->user()->name .'.' . $ext;

        $profile->save();
            // ->storeAs('user_images', $request->user()->id .'.' . $ext);
        //     dd($path);

       // $name = $request->file('image')->getClientOriginalName();
      
        // $path = $request->file('image')
        //     ->storeAs('user_images', $name);

        //the filename is to be received from the DataBase or 
            //other sources and not to be hardcoded here
      
        // Storage::delete('user_images/107.png');
        return redirect()->back()->with('message', 'Profile updated!');
    }
}
