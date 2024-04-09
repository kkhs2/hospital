<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;

class RegisterController extends Controller
{
    //
    public function create() {
        $positions = DB::select('select id, job from positions');
        return view('register.create', [
            'positions' => $positions
        ]);
    }


    public function store(Request $request) {
        $request = $request->all();
        $register = $request['register'];
        $register['password'] = password_hash($register['password'], PASSWORD_DEFAULT);

        Staff::create($register);

        return redirect('/');
    }
}
