<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
	protected $hidden = [ ];
	protected $guarded = [];
    protected $dates = ['deleted_at'];
    
    public static function getUsers()
    {
        return User::orderBy('id','desc')->paginate(10);
    }

    public static function getUser($id)
    {
        return User::where('id',$id)->first();
    }
}
