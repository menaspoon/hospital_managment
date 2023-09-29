<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Recepion;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class DoctorController extends Controller {



  function index() {
      $acount = User::where("id", Auth::id())->first();
      $insurance  = Recepion::
      join("employees", "employees.insurance_number", "=", "recepion.insurance_number")
      ->join("companies", "companies.id", "=", "employees.company")
      ->join("category", "category.id", "=", "recepion.category")
      ->join("medical_examination", "medical_examination.id", "=", "recepion.medical_examination")
      ->join("users", "users.id", "=", "recepion.doctor")
      ->select("recepion.*", "recepion.created as createdd", "employees.*", "employees.name as emp_name", "companies.name as company_name",  "category.name as category_name", "medical_examination.name as medical_examination_name", "medical_examination.price as price", "users.name as doctor")
      ->where([["recepion.hospital", $acount->hospital], ["recepion.doctor", $acount->id], ["recepion.time_filter", date("Y-m-j")], ["recepion.type", "insurance"]  ])
      //->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ["medical_examination", $id]])
      ->get();   
      
      $normal  = Recepion::join("category", "category.id", "=", "recepion.category")
      ->join("medical_examination", "medical_examination.id", "=", "recepion.medical_examination")
      ->join("users", "users.id", "=", "recepion.doctor")
      ->select("recepion.*", "recepion.created as createdd",   "category.name as category_name", "medical_examination.name as medical_examination_name", "medical_examination.price as price", "users.name as doctor")
      ->where([["recepion.hospital", $acount->hospital], ["recepion.doctor", $acount->id], ["recepion.time_filter", date("Y-m-j")], ["recepion.type", "normal"]  ])
      //->where([["recepion.hospital", $acount->hospital], ["type", "insurance"], ["medical_examination", $id]])
      ->get();   
      return view("project.my_doctor", compact("insurance", "normal"));
  }


  function  store(Request $request) {
    $acount = User::where("id", Auth::id())->first();
    $rule = $this->getRule();
    $message = $this->getMessage();

    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }

    Category::insert([
      'name'         => $request->name,
      'hospital'     => $acount->hospital,
    ]);
    return back()->with("created", "تم اضافة القســــم بنجاح");
  }


  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Category::where('id', $id)->first();
      return response()->json(["data" => $data]);
    }
  }


  function  update(Request $request) {
    $rule = $this->editRule();
    $message = $this->getMessage();

    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    Category::where("id", $request->id)->update([
      'name'         => $request->edit_name,
    ]);
    return back()->with("updated", "تم تعديل البيانات  بنجاح");
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