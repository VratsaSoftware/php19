<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // // $users = User::all();
        Carbon::setlocale('bg_Bg');
        $date = Carbon::now();
        
        // dd( $date );
        // //  Parse date with carbon - convert it to carbon object
       // $carbonated_date = Carbon::parse($expire_date_string);
        $dt = $date->toDateTimeString();
        // dd( $dt );
       //  $expire_date_string = '2016-07-27 12:45:32';
       // //  Parse date with carbon - convert it to carbon object
       // $carbonated_date = Carbon::parse($expire_date_string);
       // //  Assuming today was 2016-07-27 12:45:32
       // $diff_date = $carbonated_date->diffForHumans(Carbon::now());      

       
        //$users = User::with('role')->get();
        // $users = DB::table('users')->select('id', 'name')->get();
       
        $users = User::get_all_users_with_roles();
        $users_with_roles_count = User::count_users_with_roles();
       
        dd($users_with_roles_count);

        return view('users.index', compact('users', 'diff_date'));
    }

    public function user_courses( User $user )
    {       
        $courses = User::find($user)
            ->courses()
            ->orderBy('course_name')
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'password' => bcrypt($request->user_password), 
            'role_id' => $request->user_role
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        $user = User::find( $user->id );
        
        $roles = Role::all();

        $plucked_roles = $roles->pluck('role_name', 'id');
        // dd($plucked_roles);

        // $plucked_roles = $roles->pluck('id');
        //what to be the value, what to be the key
        // $plucked_roles = $roles->pluck('role_name', 'id');
        // dd($plucked_roles);
        
        // return view('users.edit', compact('user', 'roles'));
        return view('users.edit', compact('user', 'plucked_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user = User::find( $user->id );
       
        $user->name     = $request->user_name;
        $user->email    = $request->user_email;
        $user->password = bcrypt($request->user_password);
        $user->role_id     = $request->user_role;

        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
