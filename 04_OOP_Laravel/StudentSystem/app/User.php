<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    public static function get_all_users_with_roles()
    {
        return DB::table('users')
                ->select('users.id', 'name', 'role_name')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                // ->where('name', 'like', '%a%')
                ->get();
    }

    public static function count_users_with_roles()
    {
        return DB::table('users')
                ->select('users.id', 'name', 'role_name')
                ->join('roles', 'users.role_id', '=', 'roles.id')
                ->count();
    }
}
