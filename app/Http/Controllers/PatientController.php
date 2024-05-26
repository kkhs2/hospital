<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Classes\Patient;

class PatientController extends Controller
{
    //

    protected function searchPatientPage() {
        $hospitals = DB::select('SELECT * FROM hospitals');
        $wards = DB::select('SELECT * FROM wards');
        return view('loggedin.patientssearch', [
            'hospitals' => $hospitals,
            'wards' => $wards
        ]);
    }

    protected function searchName(Request $request) {
        $request = $request->all();
        $patients = DB::select('SELECT p.id, p.title, p.firstname, p.lastname, p.address1, p.address2, p.address3, p.towncity, p.county, p.postcode, h.name, w.department FROM patientsonwards po INNER JOIN patients p ON po.patient_id = p.id INNER JOIN hospitals h ON po.hospital_id = h.id INNER JOIN wards w ON po.ward_id = w.id WHERE p.firstname = :firstname and p.lastname = :lastname', array(
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname']
        ));
        if (!$patients) {
            return back()->with('error', 'No records found.');
        }
        else {
            return view('loggedin.patientssearchresults', [
                'patients' => $patients
            ]);
        }
    }

    protected function searchHospitalWard(Request $request) {
        $request = $request->all();
        $hospital = explode('-', $request['hospital']);
        $ward = explode('-', $request['ward']);
        $patients = DB::select('SELECT p.id, p.title, p.firstname, p.lastname, p.address1, p.address2, p.address3, p.towncity, p.county, p.postcode, h.name, w.department FROM patientsonwards po INNER JOIN patients p ON po.patient_id = p.id INNER JOIN hospitals h ON po.hospital_id = h.id INNER JOIN wards w ON po.ward_id = w.id WHERE po.hospital_id = :hospital_id and po.ward_id = :ward_id', array(
            'hospital_id' => $hospital[0],
            'ward_id' => $ward[0]
        ));
        if (!$patients) {
            return back()->with('error', 'There are no patients\' from the hospital and ward');
        }
        else {
            return view('loggedin.patientssearchresults', [
                'patients' => $patients
            ]);
        }
    }

    protected function searchPatientsOnWard() {
        
        $patients = DB::select('SELECT p.id, p.title, p.firstname, p.middlename, p.lastname, h.name AS hospitalname, w.name AS wardname, w.id AS ward_id, h.id AS hospital_id, w.id AS ward_id FROM patientshospitalswards po JOIN patients p ON po.patient_id = p.id JOIN staffshospitalswards so ON po.ward_id = so.ward_id AND po.hospital_id = so.hospital_id JOIN wards w ON so.ward_id = w.id JOIN hospitals h ON so.hospital_id = h.id WHERE so.staff_id = :staff_id', array(
            'staff_id' => session()->get('staff')[0]->id
        ));

        if (!$patients) {
            return back()->with('error', 'You do not have any patients currently in your hospital and ward.');
        }
        else {
            return view('loggedin.patientsonyourward', [
                'staffId' => session()->get('staff')[0]->id,
                'patients' => $patients
            ]);
        }
    }

    protected function patientHistory($patientId) {
        $patient = DB::select('SELECT * FROM patients WHERE id = :patient_id', array(
            'patient_id' => $patientId
        ));
        $treatments = DB::select('SELECT t.description, t.created_at, s.title, s.firstname, s.lastname, p.job FROM treatments t INNER JOIN staffs s ON t.staff_id = s.id INNER JOIN positions p ON s.position_id = p.id WHERE t.patient_id = :patient_id', array(
            'patient_id' => $patientId
        ));
        if (!$treatments || !$patient) {
            return back()->with('error', 'This patient has no historic medical records.');
        }
        else {
            return view('loggedin.patientshistory', [
                'patient' => $patient,
                'treatments' => $treatments
            ]);
        }
    }


    protected function getAddTreatmentPage(Request $request) {
        $request = $request->all();
        $patient = DB::select('SELECT * FROM patients p INNER JOIN patientsonwards po ON po.patient_id = p.id INNER JOIN hospitals h ON po.hospital_id = h.id INNER JOIN wards w ON po.ward_id = w.id where p.id = :patient_id', array(
            'patient_id' => $request['patientId']
        ));
        return view('loggedin.addpatienttreatment', [
            'patient' => $patient,
            'staffId' => session()->get('staff.id')
        ]);
    }

    protected function addTreatmentRecord(Request $request) {
        $request = $request->all();
        $treatment = DB::insert('INSERT INTO treatments VALUES (NULL, :description, :patient_id, :staff_id, :hospital_id, :ward_id, NULL, NULL)', array(
            'description' => $request['description'],
            'patient_id' => $request['patientId'],
            'staff_id' => $request['staffId'],
            'hospital_id' => $request['hospitalId'],
            'ward_id' => $request['wardId']
        ));
        if (!$treatment) {
            return redirect('searchpatientsonyourward')->with('error', 'Cannot add treatment at this time.');
        }
        else {
            return redirect('searchpatientsonyourward')->with('success', 'The treatment has been added successfully.');
        }
    }

    protected function patientDetails($patientId) {
        $patient = DB::select('SELECT * FROM patients WHERE id = :patientId', array(
            'patientId' => $patientId
        ));
        if (!$patient) {
            return back()->with('error', 'Patient does not exist');
        }
        else {
            return view('loggedin.patientdetails', [
                'patient' => $patient
            ]);
        }
    }

    protected function editPatientSaveChanges(Request $request) {
        $request = $request->all();
        $patientUpdate = DB::update('UPDATE patients SET title = :title, firstname = :firstname, middlename = :middlename, lastname = :lastname, address1 = :address1, address2 = :address2, address3 = :address3, towncity = :towncity, county = :county, postcode = :postcode WHERE id = :patientId', array(
            'patientId' => $request['patientId'],
            'title' => $request['title'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'lastname' => $request['lastname'],
            'address1' => $request['address1'],
            'address2' => $request['address2'],
            'towncity' => $request['towncity'],
            'county' => $request['county'],
            'postcode' => $request['postcode']
        ));

        if (!$patientUpdate) {
            return back()->with('danger', 'Cannot update patient details. Please ensure the details you entered are correct.');
        }
        else {
            //return back()->with('success', 'Patient details updated successfully.');
            return redirect('searchpatientsonyourward')->withInput();
        }
    }

}
