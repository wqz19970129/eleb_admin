<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rember extends Model
{
    //
    protected $fillable = [
       'name','email','password','remember_token'
    ];
}
