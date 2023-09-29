<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Employees;
use App\Models\Recepion;
use App\Models\Companies;
use App\Models\MedicalExamination\MedicalExaminationBooking;


use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class FiltterController extends Controller {



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
    $MedicalExaminationBooking = MedicalExaminationBooking::join("medical_examination", "medical_examination.id", "=", "medical_examination_booking.medical_examination")->select("medical_examination.name as booking_name", "medical_examination_booking.*")->where([["medical_examination_booking.hospital", $acount->hospital], ["medical_examination_booking.created", date("Y-m-j")]])->get();
    $insurance  = Recepion::join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
    ->join("companies", "companies.id", "=", "employees.company")->join("category", "category.id", "=", "recepion.category")
    ->join("users", "users.id", "=", "recepion.doctor")->select("recepion.*", "employees.name as emp_name", "companies.name as company_name",  "category.name as category_name",  "users.name as doctor")
    ->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end]])->get();
    $normal  = Recepion::join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
    ->join("companies", "companies.id", "=", "employees.company")->join("category", "category.id", "=", "recepion.category")->join("users", "users.id", "=", "recepion.doctor")
    ->select("recepion.*", "employees.name as emp_name", "companies.name as company_name",  "category.name as category_name",  "users.name as doctor")
    ->where([["recepion.hospital", $acount->hospital], ["type", "normal"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end]])->get();
    return view("reports.public", compact("employees", "insurance", "normal", "MedicalExaminationBooking"));
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
  $MedicalExaminationBooking = MedicalExaminationBooking::join("medical_examination", "medical_examination.id", "=", "medical_examination_booking.medical_examination")
  ->select("medical_examination.name as booking_name", "medical_examination_booking.*")->where([["medical_examination_booking.hospital", $acount->hospital], ["medical_examination_booking.created", date("Y-m-j")]])->get();
  
  $insurance  = Recepion::
  join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
  ->join("companies", "companies.id", "=", "employees.company")
  ->join("category", "category.id", "=", "recepion.category")
  //->join("medical_examination", "medical_examination.id", "=", "recepion.medical_examination")
  ->join("users", "users.id", "=", "recepion.doctor")
  ->select("recepion.*", "employees.name as emp_name", "companies.name as company_name",  "category.name as category_name",  "users.name as doctor")
  ->where([["recepion.hospital", $acount->hospital], ["recepion.type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['recepion.company', $company]])->get();
  return view("reports.company", compact("companies", "insurance", "MedicalExaminationBooking"));
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
  $MedicalExaminationBooking = MedicalExaminationBooking::join("medical_examination", "medical_examination.id", "=", "medical_examination_booking.medical_examination")->select("medical_examination.name as booking_name", "medical_examination_booking.*")->where([["medical_examination_booking.hospital", $acount->hospital], ["medical_examination_booking.created", date("Y-m-j")]])->get();
  $insurance  = Recepion::join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
  ->join("companies", "companies.id", "=", "employees.company")->join("category", "category.id", "=", "recepion.category")
  ->join("medical_examination_booking", "medical_examination_booking.name", "=", "recepion.id")

  ->join("users", "users.id", "=", "recepion.doctor")->select("recepion.*",  "employees.name as emp_name", "companies.name as company_name",  "category.name as category_name",  "users.name as doctor")
  ->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['recepion.company', $company], ['medical_examination_booking.status', $status]])->get();
  return view("reports.company_with_status", compact("companies", "insurance", "MedicalExaminationBooking", "status"));
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
      $MedicalExaminationBooking = MedicalExaminationBooking::join("medical_examination", "medical_examination.id", "=", "medical_examination_booking.medical_examination")->select("medical_examination.name as booking_name", "medical_examination_booking.*")->where([["medical_examination_booking.hospital", $acount->hospital], ["medical_examination_booking.created", date("Y-m-j")]])->get();
      $insurance  = Recepion::join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
      ->join("companies", "companies.id", "=", "employees.company")->join("category", "category.id", "=", "recepion.category")
      ->join("users", "users.id", "=", "recepion.doctor")->select("recepion.*", "employees.name as emp_name", "companies.name as company_name",  "category.name as category_name",  "users.name as doctor")
      ->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['recepion.insurance_number', $employeess]])->get();
      return view("reports.employees", compact("companies", "insurance", "MedicalExaminationBooking"));
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
      $MedicalExaminationBooking = MedicalExaminationBooking::join("medical_examination", "medical_examination.id", "=", "medical_examination_booking.medical_examination")->select("medical_examination.name as booking_name", "medical_examination_booking.*")->where([["medical_examination_booking.hospital", $acount->hospital], ["medical_examination_booking.created", date("Y-m-j")]])->get();
      $insurance  = Recepion::join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
      ->join("companies", "companies.id", "=", "employees.company")->join("category", "category.id", "=", "recepion.category")
      ->join("medical_examination_booking", "medical_examination_booking.name", "=", "recepion.id")
      ->join("users", "users.id", "=", "recepion.doctor")->select("recepion.*", "employees.name as emp_name", "companies.name as company_name",  "category.name as category_name",  "users.name as doctor")
      ->where([["recepion.hospital", $acount->hospital], ["recepion.type", "insurance"], ['recepion.time_filter', '>=', $start], ['recepion.time_filter', '<=', $end], ['recepion.insurance_number', $employeess], ['medical_examination_booking.status', $status]])->get();
      return view("reports.employees_with_status", compact("companies", "insurance", "MedicalExaminationBooking"));
  }




  function money(Request $request) {
      if ($request->balance) :
        $balance = $request->balance; $company = $request->company;
      else :
        $balance = 0; $company = 0;
      endif;
      $acount = User::where("id", Auth::id())->first();
      $companies  = Companies::where("hospital", $acount->hospital)->get();
      $employees  = Employees::where("hospital", $acount->hospital)->get();
      $MedicalExaminationBooking = MedicalExaminationBooking::join("medical_examination", "medical_examination.id", "=", "medical_examination_booking.medical_examination")->select("medical_examination.name as booking_name", "medical_examination_booking.*")->where([["medical_examination_booking.hospital", $acount->hospital], ["medical_examination_booking.created", date("Y-m-j")]])->get();
      if ($request->company) :
        $balance = Employees::join("companies", "companies.id", "=", "employees.company")->select("employees.*", "companies.name as company_name")->where("employees.balance", "<=", $balance)->where("companies.id", $company)->get();
      else :
        $balance = Employees::join("companies", "companies.id", "=", "employees.company")->select("employees.*", "companies.name as company_name")->where("employees.balance", $balance)->get();
      endif;
      return view("reports.money", compact("balance", "companies"));
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