<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\MedicalExamination\MedicalExamination;
use App\Models\MedicalExamination\MedicalExaminationCompany;
use App\Models\Employees;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class CompaniesController extends Controller {



  function index() {
      $acount = User::where("id", Auth::id())->first();
      $companies  = Companies::get();
      $medical_examination  = MedicalExamination::where("hospital", $acount->hospital)->get();
      return view("project.companies", compact("companies", "medical_examination"));
  }

  


  function get_employees_campany(Request $request) {
      if($request->ajax()) {
        $id = $request->get('id');
        $data = Employees::where('company', $request->id)->get();
        foreach ($data as $item) :
          echo "<option value=". $item->insurance_number ." >" . $item->name . "</option>";
        endforeach;
      }
  }

  function  store(Request $request) {
    $rule = $this->getRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $acount = User::where("id", Auth::id())->first();
    $fileExtintion = $request->picture->getclientoriginalextension();
    $fileName = time() . "." . $fileExtintion;
    $path = "public/companies";
    $request->picture->move($path, $fileName);
    Companies::insert([
      'name'         => $request->name,
      'email'        => $request->email,
      'phone'        => $request->phone,
      'address'      => $request->address,
      'part'         => $request->part,
      'count'        => $request->count,
      'total'        => $request->total,
      'start'        => $request->start,
      'end'          => $request->end,
      'hospital'     => $acount->hospital,
      'discount_percentage' => $request->discount_percentage,
      'logo'         => $fileName,
      'created'      => date("j, n, Y"),
    ]);

    $company = Companies::orderBy("id", "DESC")->first();
    foreach($request->medical_examination as $item){
      $MedicalExamination = MedicalExamination::where("id", $item)->first();
      MedicalExaminationCompany::insert([
            'hospital'             => $acount->hospital,
            "company"              => $company->id,
            'medical_examination'  => $item,
            'price'                => $MedicalExamination->price,
            'name'                 => $MedicalExamination->name,
      ]);
    }

    return back()->with("created", "تم تحديث البيانات بنجاح");
  }




          // شروط ادخال الحقول
          protected function getRule() {
            return $rule = [
              "name"       => "required|string",
              "email"      => "required|string",
              "phone"      => "required|string",
              "address"    => "required|string",
              "part"       => "required|string",
              "count"      => "required|numeric",
              "total"      => "required|numeric",
              "start"      => "required|string",
              "end"        => "required|string",
              "discount_percentage"        => "required|string",
              "picture"    => "required|max:2048|mimes:png,jpg,jpeg",
              "medical_examination"  => "required|array",

            ];
          }
        
         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class