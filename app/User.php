<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $fillable = ['id' ,'f_name', 'l_name', 'username', 'email', 'password', 'level', 'image', 'remember_token', 'created_at', 'updated_at'];
}
