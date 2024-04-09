<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Classes\Functions;

class HomeController extends Controller
{
    //
    protected function index() {
        if (session()->get('staff')) {
            
            return view('loggedin.home', [
                'staff' => session()->get('staff')[0]
            ]);
        }
        else {
            return redirect('/login')->with('error', 'You must be logged in to view this page.');
        }
    }


}
