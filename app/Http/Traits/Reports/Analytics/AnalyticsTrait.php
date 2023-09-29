<?php

namespace App\Http\Traits\Reports\Analytics;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Employees;
use App\Models\Recepion;
use App\Models\Companies;
use App\Models\MedicalExamination\MedicalExaminationBooking;

trait AnalyticsTrait {

    public function reportsAnalyticsTraitcompany($request) {

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
       

    }

}