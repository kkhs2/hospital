<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Classes\Staff;

class LoginController extends Controller
{   

    //
    protected function index() {
        return view('login');
    }

    protected function login(Request $request) {

        $request = $request->all();
        $email = $request['email'];
        $password = $request['password'];
        $login = DB::select('
            SELECT *
            FROM staffs s left join positions p
            on p.id = s.position_id
            WHERE email = :email    
            ', array('email' => $email)
        );


        if (empty($login) || !password_verify($password, $login[0]->password)) {
            return back()->with('error', 'We are unable to log you in. Please check and try again.');
        }
        else {
            $lastLogin = DB::update('UPDATE staffs SET lastlogin = :lastlogin WHERE id = :id', [
                'lastlogin' => now(),
                'id' => $login[0]->id
            ]);
            session()->put('staff', $login);
            return redirect('/home')->with('success', 'You are logged in.');
        }
    }

   /* public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }*/
}
