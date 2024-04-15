<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HandoverController extends Controller
{
    //
    protected function index() {
        $patients = DB::select('SELECT po.patient_id, po.hospital_id, po.ward_id, p.title, p.firstname, p.lastname, p.gender, p.dob, ho.instruction, h.name AS hospital, w.name AS ward FROM patientshospitalswards po JOIN patients p ON po.patient_id = p.id JOIN staffshospitalswards so ON po.ward_id = so.ward_id AND po.hospital_id = so.hospital_id JOIN wards w ON so.ward_id = w.id JOIN hospitals h ON so.hospital_id = h.id LEFT OUTER JOIN handovers ho ON po.hospital_id = ho.hospital_id AND po.ward_id = ho.ward_id AND po.patient_id = ho.patient_id WHERE so.staff_id = :staff_id', array(
            'staff_id' => session()->get('staff')[0]->id
        ));

        return view('loggedin.handover', [
            'patients' => $patients
        ]);
    }
}
