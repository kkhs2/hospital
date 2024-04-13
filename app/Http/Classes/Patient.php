<?php
namespace App\Http\Classes;

use Illuminate\Support\Facades\DB;

class Patient {
  public function __construct(private Patient $patient) {

  }

  public function search() {
    DB::select('SELECT p.id, p.title, p.firstname, p.lastname, p.address1, p.address2, p.towncity, p.county, p.postcode, h.name, w.name FROM patients p LEFT JOIN patientshospitalswards phw ON phw.patient_id = p.id LEFT JOIN hospitals h ON phw.hospital_id = h.id LEFT JOIN wards w ON phw.ward_id = w.id WHERE firstname = :firstname and lastname = :lastname', array(
      'firstname' => $this->patient['firstname'] ?? '',
      'lastname' => $this->patient['lastname'] ?? ''
  ));
  }
}