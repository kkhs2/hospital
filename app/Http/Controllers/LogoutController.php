<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class LogoutController extends Controller
{
    //
    protected function index() {
        session()->flush();
        return redirect('/login')->with('success', 'You have logged out of the app.');
    }
}
