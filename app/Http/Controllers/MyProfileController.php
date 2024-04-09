<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyProfileController extends Controller
{
    //
    protected function index() {
        if (session()->get('staff')) {
            return view('loggedin.myprofile', [
                'staff' => session()->get('staff')[0]
            ]);
        }
    }

    protected function update(Request $request) {
        $request = $request->all();
        $update = DB::update('UPDATE staffs SET title = :title, firstname = :firstname, middlename = :middlename, lastname = :lastname WHERE id = :staff_id', array(
            'title' => $request['title'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'staff_id' => session()->get('staff.id')
        ));
        if (!$update) {
            return back()->with('danger', 'Your details cannot be updated. Please contact the administrator');
        }
        else {
            return back()->with('success', 'Your details have been successfully updated');
        }
    }
}
