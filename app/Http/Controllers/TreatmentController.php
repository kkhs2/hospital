<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Ward;
use App\Models\Treatment;
use Illuminate\Support\Facades\DB;
use App\Classes\Database;

class TreatmentController extends Controller
{
    //
    public function show(Hospital $hospital, Patient $patient, Ward $ward) {
        $treatments = $this->getPatientTreatments($patient);
        return view('loggedin.patienttreatment', [
            'hospital' => $hospital,
            'patient' => $patient,
            'ward' => $ward,
            'staff_id' => session()->get('staff')[0]->id,
            'treatments' => $treatments
        ]);
    }

    public function create(Request $request) {
        $treatment = $request->input('treatment');
        $insertTreatment = DB::insert('INSERT INTO treatments (description, staff_id, patient_id, hospital_id, ward_id) VALUES (:description, :staff_id, :patient_id, :hospital_id, :ward_id)', [
            'description' => $treatment['description'],
            'staff_id' => $treatment['staffId'],
            'patient_id' => $treatment['patientId'],
            'hospital_id' => $treatment['hospitalId'],
            'ward_id' => $treatment['wardId']
        ]);
        
    }

    public function getPatientTreatments($patient) {
        $treatments = DB::select('SELECT t.description, t.created_at, s.title as staff_title, s.firstname as staff_firstname, s.lastname as staff_lastname, p.job FROM treatments t INNER JOIN staffs s ON s.id = staff_id JOIN positions p ON s.position_id = p.id WHERE t.patient_id = :patient_id', [
            'patient_id' => $patient->id
        ]);
        return $treatments;
    }
}
