<?php

namespace App\Http\Controllers\Reports;

use App\Http\Traits\Reports\Analytics\AnalyticsTrait;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Employees;
use App\Models\Recepion;
use App\Models\Companies;
use App\Models\Analytics\AnalyticsBooking;
use App\Models\MedicalExamination\MedicalExaminationBooking;


use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class AnalyticsReportController extends Controller {


    use AnalyticsTrait;

  function index() {
      $acount = User::where("id", Auth::id())->first();
      $employees  = Employees::where("hospital", $acount->hospital)->get();
      return view("reports.filter", compact("employees"));
  }


function public(Request $request) {
    if($request->start) :
      $start = $request->start; $end = $request->end;
    else :
      $start = 0; $end = 0;
    endif;
    $acount = User::where("id", Auth::id())->first();
    $employees  = Employees::where("hospital", $acount->hospital)->get();
    $insurance  = Recepion::
    join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
    ->join("companies", "companies.id", "=", "employees.company")
    ->join("analytics_booking", "analytics_booking.name", "=", "recepion.id")
    ->join("analytics", "analytics.id", "=", "analytics_booking.medical_examination")
    ->join("users", "users.id", "=", "analytics_booking.doctor")
    ->select("recepion.*", "employees.name as emp_name", 
    "companies.name as company_name", "analytics.name as analytics_name", "analytics_booking.status", "analytics.price", "users.name as doctor_name")
    ->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end]])->get();
    return view("reports.analytics.public", compact("employees", "insurance"));
}


function company(Request $request) {
    if($request->start) :
        $start = $request->start; $end = $request->end; $company = $request->company;
    else :
        $start = 0; $end = 0; $company = 0;
    endif;
    $acount = User::where("id", Auth::id())->first();
    $companies  = Companies::where("hospital", $acount->hospital)->get();
    $employees  = Employees::where("hospital", $acount->hospital)->get();
    $insurance  = Recepion::
    join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
    ->join("companies", "companies.id", "=", "employees.company")
    ->join("analytics_booking", "analytics_booking.name", "=", "recepion.id")
    ->join("analytics", "analytics.id", "=", "analytics_booking.medical_examination")
    ->join("users", "users.id", "=", "analytics_booking.doctor")
    ->select("recepion.*", "employees.name as emp_name", "companies.name as company_name", "analytics.name as analytics_name", "analytics.price", "users.name as doctor_name")
    ->where([["recepion.hospital", $acount->hospital], ["recepion.type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['recepion.company', $company]])->get();
  return view("reports.analytics.company", compact("companies", "insurance"));
}



function company_with_status(Request $request) {
  if($request->start) :
    $start = $request->start; $end = $request->end; $company = $request->company; $status = $request->status;
  else :
    $start = 0; $end = 0; $company = 0; $status = 0;
  endif;
  $acount = User::where("id", Auth::id())->first();
  $companies  = Companies::where("hospital", $acount->hospital)->get();
  $employees  = Employees::where("hospital", $acount->hospital)->get();
  $insurance  = Recepion::
  join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
  ->join("companies", "companies.id", "=", "employees.company")
  ->join("analytics_booking", "analytics_booking.name", "=", "recepion.id")
  ->join("analytics", "analytics.id", "=", "analytics_booking.medical_examination")
  ->join("users", "users.id", "=", "analytics_booking.doctor")
  ->select("recepion.*", "employees.name as emp_name", 
  "companies.name as company_name", "analytics.name as analytics_name", "analytics.price", "users.name as doctor_name")
  
  
  ->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['recepion.company', $company], ['analytics_booking.status', $status]])->get();
  
  return view("reports.analytics.company_with_status", compact("companies", "insurance", "status"));
}




  function employees(Request $request) {
      if($request->start) :
        $start = $request->start; $end = $request->end; $employeess = $request->employees;
      else :
        $start = 0; $end = 0; $employeess = 0; 
      endif;
      $acount = User::where("id", Auth::id())->first();
      $companies  = Companies::where("hospital", $acount->hospital)->get();
      $employees  = Employees::where("hospital", $acount->hospital)->get();
      $insurance  = Recepion::
      join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
      ->join("companies", "companies.id", "=", "employees.company")
      ->join("analytics_booking", "analytics_booking.name", "=", "recepion.id")
      ->join("analytics", "analytics.id", "=", "analytics_booking.medical_examination")
      ->join("users", "users.id", "=", "analytics_booking.doctor")
      ->select("recepion.*", "employees.name as emp_name", "companies.name as company_name", "analytics.name as analytics_name", "analytics.price", "users.name as doctor_name")
      ->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['recepion.insurance_number', $employeess]])->get();
      return view("reports.analytics.employees", compact("companies", "insurance"));
  }

  
  function receptionist(Request $request) {
    if($request->start) :
      $start = $request->start; $end = $request->end; $doctor = $request->receptionist;
    else :
      $start = 0; $end = 0; $receptionist = 0; 
    endif;
    $acount = User::where("id", Auth::id())->first();
    $companies  = Companies::where("hospital", $acount->hospital)->get();
    $employees  = Employees::where("hospital", $acount->hospital)->get();
    $receptionists    = User::where([["hospital", $acount->hospital], ["acount", "receptionist"]])->get();
    $insurance  = Recepion::
    join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
    ->join("companies", "companies.id", "=", "employees.company")
    ->join("analytics_booking", "analytics_booking.name", "=", "recepion.id")
    ->join("analytics", "analytics.id", "=", "analytics_booking.medical_examination")
    ->join("users", "users.id", "=", "analytics_booking.doctor")
    ->select("recepion.*", "employees.name as emp_name", "companies.name as company_name", "analytics.name as analytics_name", "analytics.price", "users.name as doctor_name")
    ->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['recepion.receptionist', $receptionist]])->get();
    return view("reports.analytics.doctor", compact("doctors", "insurance"));
  }



  function doctor(Request $request) {
    if($request->start) :
      $start = $request->start; $end = $request->end; $doctor = $request->doctor;
    else :
      $start = 0; $end = 0; $doctor = 0; 
    endif;
    $acount = User::where("id", Auth::id())->first();
    $companies  = Companies::where("hospital", $acount->hospital)->get();
    $employees  = Employees::where("hospital", $acount->hospital)->get();
    $doctors    = User::where([["hospital", $acount->hospital], ["acount", "doctor"]])->get();
    $insurance  = Recepion::
    join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
    ->join("companies", "companies.id", "=", "employees.company")
    ->join("analytics_booking", "analytics_booking.name", "=", "recepion.id")
    ->join("analytics", "analytics.id", "=", "analytics_booking.medical_examination")
    ->join("users", "users.id", "=", "analytics_booking.doctor")
    ->select("recepion.*", "employees.name as emp_name", "companies.name as company_name", "analytics.name as analytics_name", "analytics.price", "users.name as doctor_name")
    ->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['analytics_booking.doctor', $doctor]])->get();
    return view("reports.analytics.doctor", compact("doctors", "insurance"));
  }


  function employees_with_status(Request $request) {
      if($request->start) :
        $start = $request->start; $end = $request->end; $employeess = $request->employees; $status = $request->status;
      else :
        $start = 0; $end = 0; $employeess = 0; $status = 0;
      endif;
      $acount = User::where("id", Auth::id())->first();
      $companies  = Companies::where("hospital", $acount->hospital)->get();
      $employees  = Employees::where("hospital", $acount->hospital)->get();
      $insurance  = Recepion::
      join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
      ->join("companies", "companies.id", "=", "employees.company")
      ->join("analytics_booking", "analytics_booking.name", "=", "recepion.id")
      ->join("analytics", "analytics.id", "=", "analytics_booking.medical_examination")
      ->join("users", "users.id", "=", "analytics_booking.doctor")
      ->select("recepion.*", "employees.name as emp_name", "companies.name as company_name", "analytics.name as analytics_name", "analytics.price", "users.name as doctor_name")
      ->where([["recepion.hospital", $acount->hospital], ["recepion.type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['recepion.insurance_number', $employeess], ['analytics_booking.status', $status]])->get();
      return view("reports.analytics.employees_with_status", compact("companies", "insurance"));
  }






          // شروط ادخال الحقول
          protected function getRule() {
            return $rule = [
              "name"       => "required|string",
            ];
          }
        
         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class