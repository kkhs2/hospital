<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientSearchController extends Controller
{
    //
    public function index() {
        $hospitals = DB::select('SELECT * FROM hospitals');
        $wards = DB::select('SELECT * FROM wards');
        return view('loggedin.patientssearch', [
            'hospitals' => $hospitals,
            'wards' => $wards
        ]);
    }

    protected function searchPatientPage() {
        $hospitals = DB::select('SELECT * FROM hospitals');
        $wards = DB::select('SELECT * FROM wards');
        return view('loggedin.patientssearch', [
            'hospitals' => $hospitals,
            'wards' => $wards
        ]);
    }

    protected function search(Request $request) {
        $request = $request['patient'];

        $patients = DB::select('SELECT p.id, p.title, p.firstname, p.lastname, p.address1, p.address2, p.towncity, p.county, p.postcode, h.name, w.name FROM patients p LEFT JOIN patients_hospitals_wards phw ON phw.patient_id = p.id LEFT JOIN hospitals h ON phw.hospital_id = h.id LEFT JOIN wards w ON phw.ward_id = w.id WHERE firstname = :firstname and lastname = :lastname', array(
            'firstname' => $request['firstname'] ?? '',
            'lastname' => $request['lastname'] ?? ''
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
}
