<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MyProfileController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PatientSearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HandoverController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\RotaController;
use App\Http\Controllers\CalendarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|-----------------------------
---------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/login', 'LoginController@index');
Route::get('login', function() {
    return view('login');
});

Route::post('login', [LoginController::class, 'login']);

Route::get('home', [HomeController::class, 'index']);

Route::get('logout', [LogoutController::class, 'index']);

Route::get('myprofile', [MyProfileController::class, 'index']);

Route::post('myprofile', [MyProfileController::class, 'update']);

Route::get('information', [InformationController::class, 'index']);

Route::get('information/{page}', [InformationController::class, 'displayContent']);


Route::post('patientssearchname', [PatientSearchController::class, 'searchName']);

Route::post('patientssearchhospitalward', [PatientSearchController::class, 'searchHospitalWard']);

Route::get('patientssearch', [PatientSearchController::class, 'index']);

Route::get('register', [RegisterController::class, 'create']);

Route::post('register', [RegisterController::class, 'store']);

Route::get('searchpatientsonyourward', [PatientController::class, 'searchPatientsOnWard']);

Route::get('admin', [AdminController::class, 'index']);

Route::get('addstaff', [AdminController::class, 'addStaff']);

Route::get('addpatient', [AdminController::class, 'addPatient']);

Route::get('editpatient', [AdminController::class, 'editPatient']);

Route::get('editstaff', [AdminController::class, 'editStaff']);

Route::get('patientdetails/{patientId}', [PatientController::class, 'patientDetails']);

Route::get('handover', [HandoverController::class, 'index']);

Route::get('patienttreatment/{hospital}/{patient}/{ward}', [TreatmentController::class, 'show']);

Route::post('patienttreatment', [TreatmentController::class, 'create']);

Route::get('staffrota', [RotaController::class, 'index']);

Route::get('calendar', [CalendarController::class, 'index']);

/*Route::get('/myprofile', 'MyProfileController@index');

Route::get('/home', 'HomeController@index');

Route::get('/information', 'InformationController@index');

Route::get('/information/{page}', 'InformationController@displayContent');

Route::get('/patientssearch', 'PatientController@searchPatientPage');

Route::get('/logout', 'LogoutController@index');


Route::post('/searchApiContent', 'InformationController@displaySearchApiContent');

Route::post('/orgApiContent', 'InformationController@displayOrgApiContent');

Route::get('/handover/{staffid}', 'HandOverController@index');

Route::post('/processlogin', 'LoginController@login');

Route::post('/addpatienttreatmentrecord', 'PatientController@addTreatmentRecord');

Route::post('/myprofile', 'MyProfileController@update');

Route::post('/searchpatientname', 'PatientController@searchName');

Route::post('/searchpatientwardhospital', 'PatientController@searchHospitalWard');

Route::post('/editpatientsavechanges', 'PatientController@editPatientSaveChanges');*/