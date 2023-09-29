<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banks;

use App\Models\Companies;
use App\Models\Employees;
use App\Models\Category;

use App\Models\Recepion;
use App\Models\Settings;
use App\Models\Message\Notifications;
// العمليات
use App\Models\Surgery\Surgery;
use App\Models\Surgery\SurgeryBooking;
use App\Models\Surgery\SurgeryDepartment;
use App\Models\Surgery\SurgeryApproveCompany;
// الفحوصات
use App\Models\MedicalExamination\MedicalExamination;
use App\Models\MedicalExamination\MedicalExaminationBooking;
use App\Models\MedicalExamination\MedicalExaminationApproveCompany;
// التحاليل
use App\Models\Analytics\Analytics;
use App\Models\Analytics\AnalyticsBooking;
use App\Models\Analytics\AnalyticsDepartment;
use App\Models\Analytics\analyticsApproveCompany;
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

use App\Models\PhysicalTherapy\PhysicalTherapy;
use App\Models\PhysicalTherapy\PhysicalTherapyBooking;
use App\Models\PhysicalTherapy\PhysicalTherapyDepartment;
use App\Models\PhysicalTherapy\PhysicalTherapyApproveCompany;

use App\Models\Quartering\Quartering;
use App\Models\Quartering\QuarteringBooking;
use App\Models\Quartering\QuarteringDepartment;
use App\Models\Quartering\QuarteringApproveCompany;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;
use DB;
class CompaniesStatusController extends Controller {



  function index($company) {
      $acount = User::where("id", Auth::id())->first();
      // الفحوصات
      $MedicalExamination  = MedicalExamination::where("hospital", $acount->hospital)->get();
      $MedicalExaminationCompany  = MedicalExaminationApproveCompany::join("medical_examination", "medical_examination.id", "=", "medical_examination_approve_company.item")
      ->select("medical_examination_approve_company.*", "medical_examination.name as medical_examination")
      ->where([["medical_examination_approve_company.hospital", $acount->hospital], ["medical_examination_approve_company.company", $company]])->get();
      
      // الاشعـــة
      $ray  = Ray::where("hospital", $acount->hospital)->get();
      $rayDepartment  = RayDepartment::where("hospital", $acount->hospital)->get();
      $rayApproveCompany  = RayApproveCompany::join("ray", "ray.id", "=", "ray_approve_company.item")
      ->select("ray_approve_company.*", "ray.name as ray")
      ->where([["ray_approve_company.hospital", $acount->hospital], ["ray_approve_company.company", $company]])->get();
      
      // التحاليل
      $analytics  = Analytics::where("hospital", $acount->hospital)->get();
      $analyticsDepartment  = AnalyticsDepartment::where("hospital", $acount->hospital)->get();
      $analyticsApproveCompany  = analyticsApproveCompany::join("analytics", "analytics.id", "=", "analytics_approve_company.item")
      ->select("analytics_approve_company.*", "analytics.name as analytics")
      ->where([["analytics_approve_company.hospital", $acount->hospital], ["analytics_approve_company.company", $company]])->get();
      
      // العمليــــأت  
      $surgery  = Surgery::where("hospital", $acount->hospital)->get();
      $surgeryDepartment  = SurgeryDepartment::where("hospital", $acount->hospital)->get();
      $surgeryApproveCompany  = SurgeryApproveCompany::join("surgery", "surgery.id", "=", "surgery_approve_company.item")
      ->select("surgery_approve_company.*", "surgery.name as surgery")
      ->where([["surgery_approve_company.hospital", $acount->hospital], ["surgery_approve_company.company", $company]])->get();
      
      //  الطوارئ 
      $emergency  = Emergency::where("hospital", $acount->hospital)->get();
      $emergencyDepartment  = EmergencyDepartment::where("hospital", $acount->hospital)->get();
      $emergencyApproveCompany  = EmergencyApproveCompany::join("emergency", "emergency.id", "=", "emergency_approve_company.item")
      ->select("emergency_approve_company.*", "emergency.name as emergency")
      ->where([["emergency_approve_company.hospital", $acount->hospital], ["emergency_approve_company.company", $company]])->get();
      
      // العناية المركزة
      $intensiveCare  = IntensiveCare::where("hospital", $acount->hospital)->get();
      $intensiveCareDepartment  = IntensiveCareDepartment::where("hospital", $acount->hospital)->get();
      $intensiveCarApproveCompany  = IntensiveCareApproveCompany::join("intensive_care", "intensive_care.id", "=", "intensive_care_approve_company.item")
      ->select("intensive_care_approve_company.*", "intensive_care.name as intensive_care")
      ->where([["intensive_care_approve_company.hospital", $acount->hospital], ["intensive_care_approve_company.company", $company]])->get();
      
      // العلاج الطبيعي
      $physicalTherapy  = PhysicalTherapy::where("hospital", $acount->hospital)->get();
      $physicalTherapyDepartment  = PhysicalTherapyDepartment::where("hospital", $acount->hospital)->get();
      $physical_therapyApproveCompany  = PhysicalTherapyApproveCompany::join("physical_therapy", "physical_therapy.id", "=", "physical_therapy_approve_company.item")
      ->select("physical_therapy_approve_company.*", "physical_therapy.name as physical_therapy")
      ->where([["physical_therapy_approve_company.hospital", $acount->hospital], ["physical_therapy_approve_company.company", $company]])->get();

      // الاياء
      $quartering  = Quartering::where("hospital", $acount->hospital)->get();
      $quarteringDepartment  = QuarteringDepartment::where("hospital", $acount->hospital)->get();
      $quartering_approve_company  = QuarteringApproveCompany::join("quartering", "quartering.id", "=", "quartering_approve_company.item")
      ->select("quartering_approve_company.*", "quartering.name as quartering")
      ->where([["quartering_approve_company.hospital", $acount->hospital], ["quartering_approve_company.company", $company]])->get();
      
      $categories  = Category::where("hospital", $acount->hospital)->get();

      return view("companies.status_list", compact(
        "analytics", "analyticsDepartment", "analyticsApproveCompany",
        "categories",
        "MedicalExaminationCompany", "MedicalExamination",
        'ray', 'rayDepartment', 'rayApproveCompany',
        'quartering', 'quarteringDepartment', 'quartering_approve_company',
        'physicalTherapy', 'physicalTherapyDepartment', 'physical_therapyApproveCompany',
        'surgery', 'surgeryDepartment', 'surgeryApproveCompany',
        'emergency', 'emergencyDepartment', 'emergencyApproveCompany',
        'intensiveCare', 'intensiveCareDepartment', "intensiveCarApproveCompany"
    ));
    
  }

  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = DB::table($request->table)->where('id', $id)->first();
      return response()->json(["data" => $data]);
    }
  }


// https://daft.sex/watch/-108684267_456241885
// https://daft.sex/watch/-135050256_456239961

  function  store(Request $request) {
    $rule = $this->storeRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $acount = User::where("id", Auth::id())->first();
    // التحاليل
    if($request->analytics) :
      foreach($request->analytics as $item) :
        analyticsApproveCompany::insert([
          'item'         => $item,
          'company'     => $request->company,
          'hospital'     => $acount->hospital,
        ]);
      endforeach;
    endif;
    // الفحوصات
    if($request->medical_examination) :
      foreach($request->medical_examination as $item) :
        MedicalExaminationApproveCompany::insert([
          'item'         => $item,
          'company'     => $request->company,
          'hospital'     => $acount->hospital,
        ]);
      endforeach;
    endif;
    // الاشعة
    if($request->ray) :
      foreach($request->ray as $item) :
        RayApproveCompany::insert([
          'item'        => $item,
          'company'     => $request->company,
          'hospital'    => $acount->hospital,
        ]);
      endforeach;
    endif;
    // العمليات
    if($request->surgery) :
      foreach($request->surgery as $item) :
        SurgeryApproveCompany::insert([
          'item'        => $item,
          'company'     => $request->company,
          'hospital'    => $acount->hospital,
        ]);
      endforeach;
    endif;
    // الطوارئ
    if($request->emergency) :
      foreach($request->emergency as $item) :
        EmergencyApproveCompany::insert([
          'item'        => $item,
          'company'     => $request->company,
          'hospital'    => $acount->hospital,
        ]);
      endforeach;
    endif;
    // العناية المركزة 
    if($request->intensive_care) :
      foreach($request->intensive_care as $item) :
        IntensiveCareApproveCompany::insert([
          'item'        => $item,
          'company'     => $request->company,
          'hospital'    => $acount->hospital,
        ]);
      endforeach;
    endif;
    // العلاج الطبيعي
    if($request->physical_therapy) :
      foreach($request->physical_therapy as $item) :
        PhysicalTherapyApproveCompany::insert([
          'item'        => $item,
          'company'     => $request->company,
          'hospital'    => $acount->hospital,
        ]);
      endforeach;
    endif;
    //  الايوء
    if($request->quartering) :
      foreach($request->quartering as $item) :
        QuarteringApproveCompany::insert([
          'item'        => $item,
          'company'     => $request->company,
          'hospital'    => $acount->hospital,
        ]);
      endforeach;
    endif;
    return back()->with("created", "تم اضافة البيانات بنجاح");
  }




  function  update(Request $request) {

    $rule = $this->updateRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    DB::table($request->table)->where("id", $request->id)->update([
      'precent'         => $request->precent,
    ]);
    return back()->with("created", "تم تحديث البيانات بنجاح");
  }




  // شروط ادخال الحقول
  protected function storeRule() {
    return $rule = [
      "analytics"            => "array",
      "medical_examination"  => "array",
      "ray"                  => "array",
  ];
  }

  // شروط ادخال الحقول
  protected function updateRule() {
    return $rule = [
      "id"       => "required|string",
      "precent"       => "required|string",
  ];
  }
        
         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class