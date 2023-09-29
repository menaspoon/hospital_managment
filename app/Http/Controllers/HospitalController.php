<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hospital;
use App\Models\MedicalExamination;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class HospitalController extends Controller {



  function index() {
    $hospitals  = Hospital::get();
    return view("project.hospital", compact("hospitals"));
  }

  function edit_hospital() {
      $acount = User::where("id", Auth::id())->first();
      $hospital  = Hospital::where("id", $acount->hospital)->first();
      return view("settings.edit_hospital", compact("hospital"));
  }


  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Hospital::where('id', $id)->first();
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
    Hospital::insert([
      'name'         => $request->name,
      'email'        => $request->email,
      'phone'        => $request->phone,
      'city'         => $request->city,
      'neighborhood' => $request->neighborhood,
      'address'      => $request->address,
      'discount_percentage' => $request->discount_percentage,
      'created'      => date("j, n, Y"),
    ]);

    $hospital = Hospital::orderBy("id", "DESC")->first();
    Settings::insert([
      'hospital'               => $hospital->id,
    ]);

    return back()->with("created", "تم تحديث البيانات بنجاح");
  }



  function  update(Request $request) {

    if($request->picture) :
      $fileExtintion = $request->picture->getclientoriginalextension();
      $fileName = time() . "." . $fileExtintion;
      $path = "public/hospital";
      $request->picture->move($path, $fileName);
      Hospital::where("id", $request->id)->update([
        'name'         => $request->edit_name,
        'email'        => $request->edit_email,
        'phone'        => $request->edit_phone,
        'city'         => $request->edit_city,
        'neighborhood' => $request->edit_neighborhood,
        'address'      => $request->edit_address,
        'logo'         => $fileName,
      ]);
    else :
      Hospital::where("id", $request->id)->update([
        'name'         => $request->edit_name,
        'email'        => $request->edit_email,
        'phone'        => $request->edit_phone,
        'city'         => $request->edit_city,
        'neighborhood' => $request->edit_neighborhood,
        'address'      => $request->edit_address,
      ]);
    endif;

    return back()->with("updated", "تم تحديث البيانات بنجاح");
  }

/*
  function  update(Request $request) {
    $rule = $this->getRuleUpdate();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    Hospital::where("id", $request->id)->update([
      'start'        => $request->start,
      'end'          => $request->end,
      'notifications'=> $request->notifications,
    ]);
    return back()->with("updated", "تم تحديث البيانات بنجاح");
  }
*/


  // شروط ادخال الحقول
  protected function getRule() {
    return $rule = [
      "name"       => "required|string",
      "email"      => "required|string",
      "phone"      => "required|string",
      "city"       => "required|string",
      "neighborhood"    => "required|string",
      "address"    => "required|string",
      "discount_percentage" => "required|string",
    ];
  }
    
  
    // شروط ادخال الحقول
    protected function getRuleUpdate() {
      return $rule = [
        "start"       => "required|string",
        "end"      => "required|string",
        "notifications"      => "required|string",
        "id"       => "required|string",
      ];
    }
  //   رسائل ادخال الحقول
  protected function getMessage()  {
      return $message = [];
  }
  








} // ProdactController Class