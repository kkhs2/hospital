<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Ward;
use Illuminate\Support\Facades\DB;

class TreatmentController extends Controller
{
    //
    public function show(Hospital $hospital, Patient $patient, Ward $ward) {
        $treatments = $this->getPatientTreatments($patient);
        return view('loggedin.patienttreatment', [
            'hospital' => $hospital,
            'patient' => $patient,
            'ward' => $ward,
            'treatments' => $treatments
        ]);
    }

    public function create(Request $request) {
        $request = $request->all();
        
    }

    public function getPatientTreatments($patient) {
        $treatments = DB::select('SELECT t.description, t.created_at, s.title as staff_title, s.firstname as staff_firstname, s.lastname as staff_lastname, p.job FROM treatments t INNER JOIN staffs s ON s.id = staff_id JOIN positions p ON s.position_id = p.id WHERE t.patient_id = :patient_id', [
            'patient_id' => $patient->id
        ]);
        return $treatments;
    }
}
