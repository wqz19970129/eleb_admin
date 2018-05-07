<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventmemberController extends Controller
{
    //
    public function index(){
        $rows=DB::table('prizes')->get();
        return view('eventmembers.index',compact('rows'));
    }
}
