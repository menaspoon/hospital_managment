<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;

class EmployeesController extends Controller {



  function index($id) {
      $data  = Employees::where("company", $id)->get();
      return view("project.employees", compact("data"));
  }

  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Employees::where('id', $id)->first();
      return response()->json(["data" => $data]);
    }
  }

  function  store(Request $request) {
    $rule = $this->getRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    //$fileExtintion = $request->picture->getclientoriginalextension();
    //$fileName = time() . "." . $fileExtintion;
    //$path = "public/companies";
    //$request->picture->move($path, $fileName);

    Employees::insert([
      'name'         => $request->name,
      'phone'        => $request->phone,
      'email'        => $request->email,
      'address'      => $request->address,
      'sex'          => $request->sex,
      'nationality'  => $request->nationality,
      'blood_type'   => $request->blood_type,
      'card_id'      => $request->card_id,
      'date_of_birth'      => $request->date_of_birth,
      'relative_relation'  => $request->relative_relation,
      'insurance_number'   => $request->insurance_number,
      'balance'      => $request->balance,
      'company'      => $request->company,
    ]);
    return back()->with("created", "تم تحديث البيانات بنجاح");
  }


  function  update(Request $request) {
    $rule = $this->getEditRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    //$fileExtintion = $request->picture->getclientoriginalextension();
    //$fileName = time() . "." . $fileExtintion;
    //$path = "public/companies";
    //$request->picture->move($path, $fileName);

    Employees::where("id", $request->id)->update([
      'name'         => $request->edit_name,
      'phone'        => $request->edit_phone,
      'email'        => $request->edit_email,
      'address'      => $request->edit_address,
      'sex'          => $request->edit_sex,
      'nationality'  => $request->edit_nationality,
      'blood_type'   => $request->edit_blood_type,
      'card_id'      => $request->edit_card_id,
      'date_of_birth'      => $request->edit_date_of_birth,
      'relative_relation'  => $request->edit_relative_relation,
      'insurance_number'   => $request->edit_insurance_number,
      'balance'      => $request->edit_balance,
      //'company'      => $request->company,
    ]);
    return back()->with("created", "تم تحديث البيانات بنجاح");
  }



          // شروط ادخال الحقول
          protected function getRule() {
            return $rule = [
              "name"       => "required|string",
              "phone"      => "required|string",
              "email"      => "required|string",
              "address"    => "required|string",
              "sex"    => "required|string",
              "nationality"    => "required|string",
              "blood_type"    => "required|string",
              "card_id"    => "required|string",
              "relative_relation"    => "required|string",
              "date_of_birth"    => "required|string",
              "insurance_number"    => "required|string",
              "balance"    => "required|string",
              "company"    => "required|string",
           //   "picture"    => "required|max:2048|mimes:png,jpg,jpeg",
            ];
          }
          protected function getEditRule() {
            return $rule = [
              "edit_name"       => "required|string",
              "edit_phone"      => "required|string",
              "edit_email"      => "required|string",
              "edit_address"    => "required|string",
              "edit_sex"    => "required|string",
              "edit_nationality"    => "required|string",
              "edit_blood_type"    => "required|string",
              "edit_card_id"    => "required|string",
              "edit_relative_relation"    => "required|string",
              "edit_date_of_birth"    => "required|string",
              "edit_insurance_number"    => "required|string",
              "edit_balance"    => "required|string",
              "id"    => "required|string",
           //   "picture"    => "required|max:2048|mimes:png,jpg,jpeg",
            ];
          }


         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class