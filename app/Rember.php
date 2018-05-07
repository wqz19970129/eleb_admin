<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;

class Rember extends \Illuminate\Foundation\Auth\User
{
    //
    use LaratrustUserTrait;
    protected $fillable = [
       'name','email','password','remember_token'
    ];
}
