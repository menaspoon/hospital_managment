<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Employees;
use App\Models\Category;
use App\Models\User;
use App\Models\Recepion;
use App\Models\Members;
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
    $total_due = 0;
    $acount = User::where("id", Auth::id())->first();
    $medical_examination = MedicalExamination::where('id', $request->medical_examination)->first();
    //$employees = Employees::where('insurance_number', $request->insurance_number)->first();
    $settings  = Settings::where("hospital", $acount->hospital)->first();
    $lastMembers = Members::where("phone", $request->phone)->first();
    if(!$lastMembers) :
    Members::insert([
        'username'      => $request->name,
        'phone'         => $request->phone,
        'email'         => $request->email,
        'birthday'      => $request->birthday,
        'hospital'         => $acount->hospital,
      ]);
    endif;
    $lastMembers = Members::where("phone", $request->phone)->first();
    Recepion::insert([
      'members'             => $lastMembers->id,
      'hospital'            => $acount->hospital,
      'created'             => date("j-n-Y, g:i a"),
      'time_filter'         => date("Y-m-j"),
      'author'              => $acount->id,
      'type'                => $request->type,
    ]);

    $last = Recepion::where([['hospital', $acount->hospital]])->orderBy("id", "DESC")->first();
      // التحاليل
      for ($i = 0; $i < count($request->medical_examination); $i++) { 
        if(count($request->medical_examination) > 1) :
          $MedicalExamination = MedicalExamination::where("id", $request->medical_examination[$i])->first();
          $total_due += $MedicalExamination->price;
          MedicalExaminationBooking::insert([
                'hospital'             => $acount->hospital,
                'medical_examination'  => $request->medical_examination[$i],
                'price'                => $MedicalExamination->price,
                'name'                 => $last->id,
                "doctor"               => $request->medical_doctor[$i],
                "created"              => date("Y-m-j"),
          ]);
        endif;
      }
      // التحاليل
      for ($i = 0; $i < count($request->analytics); $i++) { 
        if($request->analytics[$i] > 1) :
          $analytics = Analytics::where("id", $request->analytics[$i])->first();
          $total_due += $analytics->price;
          AnalyticsBooking::insert([
                'hospital'             => $acount->hospital,
                'medical_examination'  => $request->analytics[$i],
                'price'                => $analytics->price,
                'name'                 => $last->id,
                "doctor"               => $request->analytics_doctor[$i],
                "created"              => date("Y-m-j"),
          ]);
        endif;
      }
      // العمليات
      for ($i = 0; $i < count($request->surgery); $i++) { 
        if($request->surgery[$i] > 1) :
          $surgery = Surgery::where("id", $request->surgery[$i])->first();
          $total_due += $surgery->price;
          SurgeryBooking::insert([
                'hospital'             => $acount->hospital,
                'medical_examination'  => $request->surgery[$i],
                'price'                => $surgery->price,
                'name'                 => $last->id,
                "doctor"               => $request->surgery_doctor[$i],
                "created"              => date("Y-m-j"),
          ]);
        endif;
      }
      // الاشعـــــة
      for ($i = 0; $i < count($request->ray); $i++) { 
        if($request->ray[$i] > 1) :
          $ray = Ray::where("id", $request->ray[$i])->first();
          $total_due += $ray->price;
          RayBooking::insert([
              'hospital'             => $acount->hospital,
              'medical_examination'  => $request->ray[$i],
              'price'                => $ray->price,
              'name'                 => $last->id,
              "doctor"               => $request->ray_doctor[$i],
              "created"              => date("Y-m-j"),
          ]);
        endif;
      }
      // الطـــــــوارئ
      for ($i = 0; $i < count($request->emergency); $i++) { 
        if($request->emergency[$i] > 1) :
          $emergency = Emergency::where("id", $request->emergency[$i])->first();
          $total_due += $emergency->price;
          EmergencyBooking::insert([
              'hospital'             => $acount->hospital,
              'medical_examination'  => $request->emergency[$i],
              'price'                => $ray->price,
              'name'                 => $last->id,
              "doctor"               => $request->emergency_doctor[$i],
              "created"              => date("Y-m-j"),
          ]);
        endif;
      }
      // العناية المركزة
      // الطـــــــوارئ
      for ($i = 0; $i < count($request->intensiveCare); $i++) { 
        if($request->intensiveCare[$i] > 1) :
          $intensiveCare = IntensiveCare::where("id", $request->intensiveCare[$i])->first();
          $total_due += $intensiveCare->price;
          IntensiveCareBooking::insert([
              'hospital'             => $acount->hospital,
              'medical_examination'  => $request->intensiveCare[$i],
              'price'                => $intensiveCare->price,
              'name'                 => $last->id,
              "doctor"               => $request->intensiveCare_doctor[$i],
              "created"              => date("Y-m-j"),
          ]);
        endif;
      }
      // الايواء
      for ($i = 0; $i < count($request->quartering); $i++) { 
        if($request->quartering[$i] > 1) :
          $quartering = Quartering::where("id", $request->quartering[$i])->first();
          $total_due += $quartering->price;
          QuarteringBooking::insert([
              'hospital'             => $acount->hospital,
              'medical_examination'  => $request->quartering[$i],
              'price'                => $quartering->price,
              'name'                 => $last->id,
              "doctor"               => $request->quartering_doctor[$i],
              "created"              => date("Y-m-j"),
          ]);
        endif;
      }
      // الايواء
      for ($i = 0; $i < count($request->physical_therapy); $i++) { 
        if($request->physical_therapy[$i] > 1) :
          $physical_therapy = PhysicalTherapy::where("id", $request->physical_therapy[$i])->first();
          $total_due += $physical_therapy->price;
          PhysicalTherapyBooking::insert([
              'hospital'             => $acount->hospital,
              'medical_examination'  => $request->physical_therapy[$i],
              'price'                => $quartering->price,
              'name'                 => $last->id,
              "doctor"               => $request->physical_therapy_doctor[$i],
              "created"              => date("Y-m-j"),
          ]);
        endif;
      }

      Recepion::where("id", $last->id)->update([
        "total_due"       => $total_due
      ]);

    
    //return back()->with("created", "تم تحديث البيانات بنجاح");
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