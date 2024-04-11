<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {
        return view('admin.home');
    }

    public function addStaff() {
        return view('admin.addstaff');
    }

    public function editStaff() {
        return view('admin.editstaff');
    }

    public function addPatient() {
        return view('admin.addPatient');
    }

    public function editPatient() {
        return view('admin.editPatient');
    }

}
