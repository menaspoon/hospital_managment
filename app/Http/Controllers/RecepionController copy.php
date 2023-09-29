<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Employees;
use App\Models\Category;
use App\Models\User;
use App\Models\Recepion;
use App\Models\Settings;
use App\Models\Message\Notifications;

// الفحوصات
use App\Models\MedicalExamination\MedicalExamination;
use App\Models\MedicalExamination\MedicalExaminationBooking;
use App\Models\MedicalExamination\MedicalExaminationApproveCompany;
//العمليات
use App\Models\Surgery\Surgery;
use App\Models\Surgery\SurgeryBooking;
use App\Models\Surgery\SurgeryDepartment;
// التحاليل
use App\Models\Analytics\Analytics;
use App\Models\Analytics\AnalyticsBooking;
use App\Models\Analytics\AnalyticsDepartment;
use App\Models\Analytics\AnalyticsApproveCompany;
// الاشعـــــــة
use App\Models\Ray\Ray;
use App\Models\Ray\RayBooking;
use App\Models\Ray\RayDepartment;
use App\Models\Ray\RayApproveCompany;
// الطــــوارئ
use App\Models\Emergency\Emergency;
use App\Models\Emergency\EmergencyBooking;
use App\Models\Emergency\EmergencyDepartment;
use App\Models\Emergency\EmergencyApproveCompany;
// العناية المركزة
use App\Models\IntensiveCare\IntensiveCare;
use App\Models\IntensiveCare\IntensiveCareBooking;
use App\Models\IntensiveCare\IntensiveCareDepartment;
use App\Models\IntensiveCare\IntensiveCareApproveCompany;
// العلاج الطبيعي
use App\Models\PhysicalTherapy\PhysicalTherapy;
use App\Models\PhysicalTherapy\PhysicalTherapyBooking;
use App\Models\PhysicalTherapy\PhysicalTherapyDepartment;
use App\Models\PhysicalTherapy\PhysicalTherapyApproveCompany;
//  الايواء
use App\Models\Quartering\Quartering;
use App\Models\Quartering\QuarteringBooking;
use App\Models\Quartering\QuarteringDepartment ;
use App\Models\Quartering\QuarteringApproveCompany;


use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;

class RecepionController extends Controller {



  function index() {
    $acount = User::where("id", Auth::id())->first();
    $credit_officer = User::where([["acount", "credit_officer"], ["hospital", $acount->hospital]])->first();
    $settings  = Settings::where("hospital", $acount->hospital)->first();
    $employees  = Employees::where([["hospital", $acount->hospital], ["balance", "<=", $settings->notification_balance]])->get();
    /*
    foreach($employees as $item) :
      Notifications::insert([
        "hospital"    => $acount->hospital,
        "user"        => $credit_officer->id,
        "created"     => date("j-n-Y, g:i a"),
        "message"     => "<h4>رسالة تحذيرية</h4>" . "<p> رصيد</p>" . $item->name . "<p> قارب علي الانتهاء الرصيد المتبقي </p>" . "<strong style='color:red'>". $item->balance ."</strong>"
      ]);
    endforeach;
    */
      $categories  = Category::where("hospital", $acount->hospital)->get();
      $doctor  = User::where("hospital", $acount->hospital)->where("acount", "doctor")->get();
      $category  = Category::where("hospital", $acount->hospital)->get();
      
      $MedicalExamination  = MedicalExamination::where("hospital", $acount->hospital)->get();
      $MedicalExaminationCompany  = MedicalExaminationApproveCompany::where("hospital", $acount->hospital)->get();
      
      $ray  = Ray::where("hospital", $acount->hospital)->get();
      $rayDepartment  = RayDepartment::where("hospital", $acount->hospital)->get();
      
      $analytics  = Analytics::where("hospital", $acount->hospital)->get();
      $analyticsDepartment  = AnalyticsDepartment::where("hospital", $acount->hospital)->get();
                  
      $surgery  = Surgery::where("hospital", $acount->hospital)->get();
      $surgeryDepartment  = SurgeryDepartment::where("hospital", $acount->hospital)->get();
      //  الطوارئ 
      $emergency  = Emergency::where("hospital", $acount->hospital)->get();
      $emergencyDepartment  = EmergencyDepartment::where("hospital", $acount->hospital)->get();
      // العناية المركزة
      $intensiveCare  = IntensiveCare::where("hospital", $acount->hospital)->get();
      $intensiveCareDepartment  = IntensiveCareDepartment::where("hospital", $acount->hospital)->get();
      // العلاج الطبيعــــي
      $physicalTherapy  = PhysicalTherapy::where("hospital", $acount->hospital)->get();
      $physicalTherapyDepartment  = PhysicalTherapyDepartment::where("hospital", $acount->hospital)->get();
      
      $quartering  = Quartering::where("hospital", $acount->hospital)->get();
      $quarteringDepartment  = QuarteringDepartment::where("hospital", $acount->hospital)->get();


      

      $count_all = Recepion::where([["hospital", $acount->hospital], ["time_filter", date("Y-m-j")]])->count();
      $count_normal = Recepion::where([["hospital", $acount->hospital], ["time_filter", date("Y-m-j")], ["type", "normal"]])->count();
      $count_insurance = Recepion::where([["hospital", $acount->hospital], ["time_filter", date("Y-m-j")], ["type", "insurance"]])->count();
      $count_wating = Recepion::where([["hospital", $acount->hospital], ["time_filter", date("Y-m-j")]])->count();
      $count_done = Recepion::where([["hospital", $acount->hospital], ["time_filter", date("Y-m-j")]])->count();
      $count_online = Recepion::where([["hospital", $acount->hospital], ["time_filter", date("Y-m-j")], ["online", "off"]])->count();

      return view("project.recepion", compact(
        "analytics", "surgery", "analyticsDepartment", 
        "categories", "doctor", "category", 
        "MedicalExaminationCompany", "MedicalExamination",
        'ray', 'rayDepartment',
        'surgery', 'surgeryDepartment',
        'physicalTherapy', 'physicalTherapyDepartment',
        'quartering', 'quarteringDepartment',
        'emergency', 'emergencyDepartment',
        'intensiveCare', 'intensiveCareDepartment',
        "count_all", "count_normal", "count_insurance", "count_wating", "count_done", "count_online"
    ));
  }



  function query_insurance_number(Request $request) {
    if($request->ajax()) {
       $insurance_number = $request->get('insurance_number');
      //$company          = $request->get('company');
      $data = Employees::join("companies", "companies.id", "=", "employees.company")
      ->select("employees.*", "companies.name as company_name")
      ->where('employees.insurance_number', $insurance_number)->first();
      if ($data) :
        echo '<div class="name">الاسم : <strong>'. $data->name .'</strong></div>';
        echo '<div class="name">الشركة : <strong>'. $data->company_name . '</strong></div>';
        echo '<div class="balance">الرصيد : <strong>'. $data->balance . ' دينار ' . '</strong></div>';
        echo '<div class="remaining_amount">الرصيد المتبقي : <strong>'. $data->remaining_amount . ' دينار ' . '</strong></div>';
        echo '<br>';
      else :
        echo '<div style="color:red" class="text-center"> رقم التامين غير موجود في سجلاتنا </div>';
      endif;
    }
  }





  
  function get_medical_examination(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = MedicalExamination::where('category', $id)->get();
      foreach ($data as $item) :
        echo "<option data-id=". $item->id ." value=". $item->id ." >" . $item->name . " - " . $item->price . "دينار " . "</option>";
      endforeach;
    }
}


  




function examination($id) {
  $acount = User::where("id", Auth::id())->first();
  $title = MedicalExamination::where("id", $id)->first();

  $MedicalExamination  = MedicalExamination::where("hospital", $acount->hospital)->get();
  $MedicalExaminationBooking = MedicalExaminationBooking::join("medical_examination", "medical_examination.id", "=", "medical_examination_booking.medical_examination")
  ->select("medical_examination.name as booking_name", "medical_examination_booking.*")->where([["medical_examination_booking.hospital", $acount->hospital], ["medical_examination_booking.created", date("Y-m-j")]])->get();
  

  $insurance = MedicalExaminationBooking::join("recepion", "recepion.id", "=", "medical_examination_booking.name")
  ->join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
  ->join("companies", "companies.id", "=", "employees.company")
  ->join("category", "category.id", "=", "recepion.category")
  ->join("medical_examination", "medical_examination.id", "=", "medical_examination_booking.medical_examination")
  ->select("recepion.*", "employees.name as emp_name", "companies.name as company_name", "medical_examination_booking.price", "medical_examination.name as medical_examination_name",  "category.name as category_name")
  ->where([["recepion.hospital", $acount->hospital], ["recepion.type", "insurance"], ["medical_examination_booking.medical_examination", $id], ["time_filter", date("Y-m-j")]])->get();
  
/*
  $normal = MedicalExaminationBooking::join("recepion", "recepion.id", "=", "medical_examination_booking.name")
  ->join("category", "category.id", "=", "recepion.category")
  ->join("users", "users.id", "=", "recepion.doctor")
  ->join("medical_examination", "medical_examination.id", "=", "medical_examination_booking.medical_examination")
  ->select("recepion.*",  "medical_examination_booking.price", "medical_examination.name as medical_examination_name",  "category.name as category_name",  "users.name as doctor")
  ->where([["recepion.hospital", $acount->hospital], ["recepion.type", "normal"], ["medical_examination_booking.medical_examination", $id]])->get();
  */
  
  return view("project.examination", compact("insurance", "title"));
}






// 1000 اغنية في جيبك 



  function  store(Request $request) {
    //$rule = $this->getRuleInsurance();
    //$message = $this->getMessage();

    //$validator = Validator::make($request->all(), $rule, $message);
    //if($validator->fails()) {
    // return redirect()->back()->withErrors($validator)->withInput($request->all());
//  }
    $total_due = 0;
    $acount = User::where("id", Auth::id())->first();
    $medical_examination = MedicalExamination::where('id', $request->medical_examination)->first();
    $employees = Employees::where('insurance_number', $request->insurance_number)->first();
    $credit_officer = User::where('company', $employees->company)->first();
    $settings  = Settings::where("hospital", $acount->hospital)->first();
   // $company  = Companies::where("id", $employees->company)->first();

    Recepion::insert([
      'insurance_number'    => $request->insurance_number,
      'hospital'            => $acount->hospital,
      'created'             => date("j-n-Y, g:i a"),
      'time_filter'         => date("Y-m-j"),
      //'ranking_number'      => $ranking_number,
      'author'              => $acount->id,
      'type'                => $request->type,
      'company'             => $employees->company,
    ]);

    $last = Recepion::where([['hospital', $acount->hospital], ['type', 'insurance']])->orderBy("id", "DESC")->first();
    //if($last) :
    //  $ranking_number = $last->ranking_number += 1;
    //else :
    //  $ranking_number = 0;
    //endif;

    //Employees::where("insurance_number", $request->insurance_number)->update([
    //  "remaining_amount" =>  $employees->remaining_amount - $medical_examination->price
    //]);
    

    if(count($request->medical_examination) > 1) :
      foreach($request->medical_examination as $item){
        if($item > 0) :
          $MedicalExamination = MedicalExamination::where("id", $item)->first();
          $MedicalExaminationCompany = MedicalExaminationApproveCompany::where("item", $item)->first();
          IF($MedicalExaminationCompany) :
            if($MedicalExaminationCompany->item == $item) :
              $status = "ok";
              $precent = (int)100 - (int)$MedicalExaminationCompany->precent;
              echo (int)$MedicalExamination->price / (int)100 * (int)$precent;
            endif;
          ELSE :
            $status = "not";
          ENDIF;
          MedicalExaminationBooking::insert([
                'hospital'       => $acount->hospital,
                'medical_examination'  => $item,
                'price'                => $MedicalExamination->price,
                'name'                 => $last->id,
                'status'               => $status,
                "created"              => date("Y-m-j"),
          ]);
          $total_due += $MedicalExamination->price;
          // خصم سعر الكشف من الرصيد
          if($settings->receive_payments == "booking") :
            //$MedicalExamination->price / 100 * $company->discount_percentage
            Employees::where("id", $employees->id)->update([
              "balance" => $employees->balance - $MedicalExamination->price,
            ]);
          endif; // $settings->receive_payments
        endif; // item > 0
      }
        $lastMedicalBooking = MedicalExaminationBooking::orderBy("name", "DESC")->first();
        foreach($request->medical_doctor as $key => $doctor) :
          $Booking = MedicalExaminationBooking::where("name", $lastMedicalBooking->name)->where("doctor", "0")->first();
          MedicalExaminationBooking::where("id",  $Booking->id)->update([
              "doctor" => $doctor,
          ]);        
        endforeach; 
      endif;





    // التحاليل
    if(count($request->analytics) > 1) :
      $last = Recepion::where([['hospital', $acount->hospital], ['type', 'insurance']])->orderBy("id", "DESC")->first();
      foreach($request->analytics as $item){
        if($item > 0) :
          $element = Analytics::where("id", $item)->first();
          $element_approve_company = AnalyticsApproveCompany::where("item", $item)->first();
          IF($element_approve_company) :
            if($element_approve_company->item == $item) :
              $status = "ok";
              $precent = (int)100 - (int)$element_approve_company->precent;
              echo (int)$element->price / (int)100 * (int)$precent;
            endif;
          ELSE :
            $status = "not";
          ENDIF;
          AnalyticsBooking::insert([
                'hospital'       => $acount->hospital,
                'medical_examination'           => $item,
                'price'                => $element->price,
                'name'                 => $last->id,
                'status'               => $status,
                "created"              => date("Y-m-j"),
          ]);
          $total_due += $element->price;
          // خصم سعر الكشف من الرصيد
          if($settings->receive_payments == "booking") :
            //$MedicalExamination->price / 100 * $company->discount_percentage
            Employees::where("id", $employees->id)->update([
              "balance" => $employees->balance - $element->price,
            ]);
          endif; // $settings->receive_payments
        endif; // item > 0
      }
      $lastMedicalBooking = AnalyticsBooking::orderBy("name", "DESC")->first();
      echo $lastMedicalBooking->id;
      foreach($request->analytics_doctor as $doctor) :
        $Bookings = AnalyticsBooking::where("name", $lastMedicalBooking->name)->where("doctor", "0")->first();
        AnalyticsBooking::where("id",  $Bookings->id)->update([
            "doctor" => $doctor,
        ]);        
      endforeach;  
    endif;

    


    // الاشعــــــة
    if(count($request->ray) > 1) :
      $last = Recepion::where([['hospital', $acount->hospital], ['type', 'insurance']])->orderBy("id", "DESC")->first();
      foreach($request->ray as $item){
        if($item > 0) :
          $element = Ray::where("id", $item)->first();
          $element_approve_company = RayApproveCompany::where("item", $item)->first();
          IF($element_approve_company) :
            if($element_approve_company->item == $item) :
              $status = "ok";
              $precent = (int)100 - (int)$element_approve_company->precent;
              echo (int)$element->price / (int)100 * (int)$precent;
            endif;
          ELSE :
            $status = "not";
          ENDIF;
          RayBooking::insert([
                'hospital'       => $acount->hospital,
                'medical_examination'  => $item,
                'price'                => $element->price,
                'name'                 => $last->id,
                'status'               => $status,
                "created"              => date("Y-m-j"),
          ]);
          $total_due += $element->price;
          // خصم سعر الكشف من الرصيد
          if($settings->receive_payments == "booking") :
            //$MedicalExamination->price / 100 * $company->discount_percentage
            Employees::where("id", $employees->id)->update([
              "balance" => $employees->balance - $element->price,
            ]);
          endif; // $settings->receive_payments
        endif; // item > 0
      }
      $lastMedicalBooking = RayBooking::orderBy("name", "DESC")->first();
      echo $lastMedicalBooking->id;
      foreach($request->ray_doctor as $doctor) :
        $Bookings = RayBooking::where("name", $lastMedicalBooking->name)->where("doctor", "0")->first();
        RayBooking::where("id",  $Bookings->id)->update([
            "doctor" => $doctor,
        ]);        
      endforeach;  
    endif;


    // العمليات
    if(count($request->surgery) > 1) :
      $last = Recepion::where([['hospital', $acount->hospital], ['type', 'insurance']])->orderBy("id", "DESC")->first();
      foreach($request->surgery as $item){
        if($item > 0) :
          $element = Ray::where("id", $item)->first();
          $element_approve_company = SurgeryApproveCompany::where("item", $item)->first();
          IF($element_approve_company) :
            if($element_approve_company->item == $item) :
              $status = "ok";
              $precent = (int)100 - (int)$element_approve_company->precent;
              echo (int)$element->price / (int)100 * (int)$precent;
            endif;
          ELSE :
            $status = "not";
          ENDIF;
          SurgeryBooking::insert([
                'hospital'       => $acount->hospital,
                'medical_examination'  => $item,
                'price'                => $element->price,
                'name'                 => $last->id,
                'status'               => $status,
                "created"              => date("Y-m-j"),
          ]);
          $total_due += $element->price;
          // خصم سعر الكشف من الرصيد
          if($settings->receive_payments == "booking") :
            //$MedicalExamination->price / 100 * $company->discount_percentage
            Employees::where("id", $employees->id)->update([
              "balance" => $employees->balance - $element->price,
            ]);
          endif; // $settings->receive_payments
        endif; // item > 0
      }
      $lastMedicalBooking = SurgeryBooking::orderBy("name", "DESC")->first();
      echo $lastMedicalBooking->id;
      foreach($request->surgery_doctor as $doctor) :
        $Bookings = SurgeryBooking::where("name", $lastMedicalBooking->name)->where("doctor", "0")->first();
        SurgeryBooking::where("id",  $Bookings->id)->update([
            "doctor" => $doctor,
        ]);        
      endforeach;  
    endif;


    // طوارئ
    if(count($request->emergency) > 1) :
      $last = Recepion::where([['hospital', $acount->hospital], ['type', 'insurance']])->orderBy("id", "DESC")->first();
      foreach($request->emergency as $item){
        if($item > 0) :
          $element = Emergency::where("id", $item)->first();
          $element_approve_company = EmergencyApproveCompany::where("item", $item)->first();
          IF($element_approve_company) :
            if($element_approve_company->item == $item) :
              $status = "ok";
              $precent = (int)100 - (int)$element_approve_company->precent;
              echo (int)$element->price / (int)100 * (int)$precent;
            endif;
          ELSE :
            $status = "not";
          ENDIF;
          EmergencyBooking::insert([
                'hospital'       => $acount->hospital,
                'medical_examination'  => $item,
                'price'                => $element->price,
                'name'                 => $last->id,
                'status'               => $status,
                "created"              => date("Y-m-j"),
          ]);
          $total_due += $element->price;
          // خصم سعر الكشف من الرصيد
          if($settings->receive_payments == "booking") :
            //$MedicalExamination->price / 100 * $company->discount_percentage
            Employees::where("id", $employees->id)->update([
              "balance" => $employees->balance - $element->price,
            ]);
          endif; // $settings->receive_payments
        endif; // item > 0
      }
      $lastMedicalBooking = EmergencyBooking::orderBy("name", "DESC")->first();
      echo $lastMedicalBooking->id;
      foreach($request->emergency_doctor as $doctor) :
        $Bookings = EmergencyBooking::where("name", $lastMedicalBooking->name)->where("doctor", "0")->first();
        EmergencyBooking::where("id",  $Bookings->id)->update([
            "doctor" => $doctor,
        ]);        
      endforeach;  
    endif;

    // العناية المركزة
    if(count($request->intensiveCare) > 1) :
      $last = Recepion::where([['hospital', $acount->hospital], ['type', 'insurance']])->orderBy("id", "DESC")->first();
      foreach($request->intensiveCare as $item){
        if($item > 0) :
          $element = IntensiveCare::where("id", $item)->first();
          $element_approve_company = IntensiveCareApproveCompany::where("item", $item)->first();
          IF($element_approve_company) :
            if($element_approve_company->item == $item) :
              $status = "ok";
              $precent = (int)100 - (int)$element_approve_company->precent;
              echo (int)$element->price / (int)100 * (int)$precent;
            endif;
          ELSE :
            $status = "not";
          ENDIF;
          IntensiveCareBooking::insert([
                'hospital'       => $acount->hospital,
                'medical_examination'  => $item,
                'price'                => $element->price,
                'name'                 => $last->id,
                'status'               => $status,
                "created"              => date("Y-m-j"),
          ]);
          $total_due += $element->price;
          // خصم سعر الكشف من الرصيد
          if($settings->receive_payments == "booking") :
            //$MedicalExamination->price / 100 * $company->discount_percentage
            Employees::where("id", $employees->id)->update([
              "balance" => $employees->balance - $element->price,
            ]);
          endif; // $settings->receive_payments
        endif; // item > 0
      }
      $lastMedicalBooking = IntensiveCareBooking::orderBy("name", "DESC")->first();
      echo $lastMedicalBooking->id;
      foreach($request->intensiveCare_doctor as $doctor) :
        $Bookings = IntensiveCareBooking::where("name", $lastMedicalBooking->name)->where("doctor", "0")->first();
        IntensiveCareBooking::where("id",  $Bookings->id)->update([
            "doctor" => $doctor,
        ]);        
      endforeach;  
    endif;

    // العلاج الطبيعي 
    if(count($request->physical_therapy) > 1) :
      $last = Recepion::where([['hospital', $acount->hospital], ['type', 'insurance']])->orderBy("id", "DESC")->first();
      foreach($request->physical_therapy as $item){
        if($item > 0) :
          $element = PhysicalTherapy::where("id", $item)->first();
          $element_approve_company = PhysicalTherapyApproveCompany::where("item", $item)->first();
          IF($element_approve_company) :
            if($element_approve_company->item == $item) :
              $status = "ok";
              $precent = (int)100 - (int)$element_approve_company->precent;
              echo (int)$element->price / (int)100 * (int)$precent;
            endif;
          ELSE :
            $status = "not";
          ENDIF;
          PhysicalTherapyBooking::insert([
                'hospital'       => $acount->hospital,
                'medical_examination'  => $item,
                'price'                => $element->price,
                'name'                 => $last->id,
                'status'               => $status,
                "created"              => date("Y-m-j"),
          ]);
          $total_due += $element->price;
          // خصم سعر الكشف من الرصيد
          if($settings->receive_payments == "booking") :
            //$MedicalExamination->price / 100 * $company->discount_percentage
            Employees::where("id", $employees->id)->update([
              "balance" => $employees->balance - $element->price,
            ]);
          endif; // $settings->receive_payments
        endif; // item > 0
      }
      $lastMedicalBooking = PhysicalTherapyBooking::orderBy("name", "DESC")->first();
      echo $lastMedicalBooking->id;
      foreach($request->physical_therapy_doctor as $doctor) :
        $Bookings = PhysicalTherapyBooking::where("name", $lastMedicalBooking->name)->where("doctor", "0")->first();
        PhysicalTherapyBooking::where("id",  $Bookings->id)->update([
            "doctor" => $doctor,
        ]);        
      endforeach;  
    endif;

    // الايواء
    if(count($request->quartering) > 1) :
      $last = Recepion::where([['hospital', $acount->hospital], ['type', 'insurance']])->orderBy("id", "DESC")->first();
      foreach($request->quartering as $item){
        if($item > 0) :
          $element = Quartering::where("id", $item)->first();
          $element_approve_company = QuarteringApproveCompany::where("item", $item)->first();
          IF($element_approve_company) :
            if($element_approve_company->item == $item) :
              $status = "ok";
              $precent = (int)100 - (int)$element_approve_company->precent;
              echo (int)$element->price / (int)100 * (int)$precent;
            endif;
          ELSE :
            $status = "not";
          ENDIF;
          QuarteringBooking::insert([
                'hospital'       => $acount->hospital,
                'medical_examination'  => $item,
                'price'                => $element->price,
                'name'                 => $last->id,
                'status'               => $status,
                "created"              => date("Y-m-j"),
          ]);
          $total_due += $element->price;
          // خصم سعر الكشف من الرصيد
          if($settings->receive_payments == "booking") :
            //$MedicalExamination->price / 100 * $company->discount_percentage
            Employees::where("id", $employees->id)->update([
              "balance" => $employees->balance - $element->price,
            ]);
          endif; // $settings->receive_payments
        endif; // item > 0
      }
      $lastMedicalBooking = QuarteringBooking::orderBy("name", "DESC")->first();
      echo $lastMedicalBooking->id;
      foreach($request->quartering_doctor as $doctor) :
        $Bookings = QuarteringBooking::where("name", $lastMedicalBooking->name)->where("doctor", "0")->first();
        QuarteringBooking::where("id",  $Bookings->id)->update([
            "doctor" => $doctor,
        ]);        
      endforeach;  
    endif;

/*
    // حجز التحاليل
    foreach($request->analytics as $item){
        $analytics = Analytics::where("id", $item)->first();
        $MedicalExaminationCompany = MedicalExaminationCompany::where("medical_examination", $item)->first();
        IF($MedicalExaminationCompany) :
          if($MedicalExaminationCompany->medical_examination == $item) :
            $status = "ok";
          endif;
        ELSE :
          $status = "not";
        ENDIF;
        $total_due += $analytics->price; // جمع اجمالي السعر
        AnalyticsBooking::insert([
              'hospital'       => $acount->hospital,
              'medical_examination'  => $item,
              'price'                => $analytics->price,
              'name'                 => $last->id,
              'status'               => $status,
              "created"              => date("Y-m-j"),
        ]);
        // خصم سعر الكشف من الرصيد
        if($settings->receive_payments == "booking") :
          //$MedicalExamination->price / 100 * $company->discount_percentage
          Employees::where("id", $employees->id)->update([
            "balance" => $employees->balance - $MedicalExamination->price,
          ]);
        endif;
    } // foreach analytics



    // العمــــــــــليات
    foreach($request->surgery as $item){
        $surgery = Surgery::where("id", $item)->first();
        $total_due += $surgery->price; // جمع اجمالي السعر
        $MedicalExaminationCompany = MedicalExaminationCompany::where("medical_examination", $item)->first();
        IF($MedicalExaminationCompany) :
          if($MedicalExaminationCompany->medical_examination == $item) :
            $status = "ok";
          endif;
        ELSE :
          $status = "not";
        ENDIF;
        SurgeryBooking::insert([
              'hospital'       => $acount->hospital,
              'booking'        => $item,
              'price'          => $surgery->price,
              'name'           => $last->id,
              'status'         => $status,
              "created"        => date("Y-m-j"),
        ]);
        // خصم سعر الكشف من الرصيد
        if($settings->receive_payments == "booking") :
          //$MedicalExamination->price / 100 * $company->discount_percentage
          Employees::where("id", $employees->id)->update([
            "balance" => $employees->balance - $MedicalExamination->price,
          ]);
        endif;
    } // foreach analytics

    */
    Recepion::where("id", $last->id)->update([
        "total_due"       => $total_due
    ]);
/*
    Notifications::insert([
        "user"       => $credit_officer->id,
        "message"    => "", //"تم حجز كشف " . $medical_examination->name . " للمريض " . $employees->name . " في توقيت " . date("j-n-Y, g:i a"),
        "created"    => date("j, n, Y"),
    ]);
*/



    
    return back()->with("created", "تم تحديث البيانات بنجاح");
  }



  
  function  store_single_recepion(Request $request) {
    $rule = $this->getRuleSingleRecepion();
    $message = $this->getMessage();

    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }

    $acount = User::where("id", Auth::id())->first();
    $last = Recepion::where('hospital', $acount->hospital)->orderBy("id", )->first();
    if($last) :
      $ranking_number = $last->ranking_number += 1;
    else :
      $ranking_number = 0;
    endif;
    
    Recepion::insert([
      'username'            => $request->name,
      'phone'               => $request->phone,
      'hospital'            => $acount->hospital,
      'created'             => date("j-n-Y, g:i a"),
      'time_filter'         => date("Y-m-j"),
      //'ranking_number'      => $ranking_number,
      'author'              => $acount->id,
      'type'                => $request->type,
    ]);

    $last = Recepion::where([['hospital', $acount->hospital], ['type', 'normal']])->orderBy("id", "DESC")->first();

    foreach($request->medical_examination as $item){
      $MedicalExamination = MedicalExamination::where("id", $item)->first();
      MedicalExaminationBooking::insert([
            'hospital'       => $acount->hospital,
            'medical_examination'  => $item,
            'price'                => $MedicalExamination->price,
            'name'                 => $last->id,
            'status'               => $MedicalExamination->status,
            'type'                 => $request->type,
            "created"              => date("Y-m-j"),
      ]);
    }


    return back()->with("created", "تم تحديث البيانات بنجاح");
  }

  
  // شروط ادخال الحقول
  protected function getRuleInsurance() {
    return $rule = [
      "insurance_number"     => "required|string",
      "category"             => "required|string",
      "medical_examination"  => "required|array",
      "doctor"               => "required|string",
      "type"                 => "required|string",
    ];
  }

    // شروط ادخال الحقول
    protected function getRuleSingleRecepion() {
      return $rule = [
        "name"                 => "required|string",
        "phone"                => "required|string",
        "category"             => "required|string",
        "medical_examination"  => "required|array",
        "doctor"               => "required|string",
        "type"                 => "required|string",
      ];
    }
        
         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class