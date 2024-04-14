<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HandOverController extends Controller
{
    //
    protected function index() {
        $patients = DB::select('SELECT po.patient_id, po.hospital_id, po.ward_id, p.title, p.firstname, p.middlename, p.lastname, p.gender, p.dob, ho.instructions, ho.conditions, h.name, w.name FROM patientsonwards po INNER JOIN patients p ON po.patient_id = p.id INNER JOIN staffsonwards so ON po.ward_id = so.ward_id AND po.hospital_id = so.hospital_id INNER JOIN wards w ON so.ward_id = w.id INNER JOIN hospitals h ON so.hospital_id = h.id LEFT OUTER JOIN handovers ho ON po.hospital_id = ho.hospital_id AND po.ward_id = ho.ward_id AND po.patient_id = ho.patient_id WHERE so.staff_id = :staff_id', array(
            'staff_id' => session()->get('staff')[0]->id
        ));

        return view('loggedin.handover', [
            'patients' => $patients
        ]);
    }
}
