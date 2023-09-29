<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Surgery;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class SurgeryController extends Controller {



  function index() {
      $acount = User::where("id", Auth::id())->first();
      $data  = Surgery::where("hospital", $acount->hospital)->get();
      return view("project.surgery", compact("data"));
  }


  function  store(Request $request) {
    $acount = User::where("id", Auth::id())->first();
    $rule = $this->getRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    Surgery::insert([
      'name'         => $request->name,
      'price'        => $request->price,
      'hospital'     => $acount->hospital,
    ]);
    return back()->with("created", "تم اضافة البيانات بنجاح");
  }



  
  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Surgery::where('id', $id)->first();
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
    Surgery::where("id", $request->id)->update([
      'name'         => $request->edit_name,
      'price'        => $request->edit_price,
    ]);
    return back()->with("updated", "تم تعديل البيانات  بنجاح");
  }


  // شروط ادخال الحقول
  protected function getRule() {
    return $rule = [
      "name"       => "required|string",
      "price"       => "required|string",
    ];
  }
  
  // شروط ادخال الحقول
  protected function editRule() {
    return $rule = [
      "id"              => "required|string",
      "edit_name"       => "required|string",
      "edit_price"      => "required|string",
    ];
  }    
  //   رسائل ادخال الحقول
  protected function getMessage()  {
      return $message = [];
  }
  








} // ProdactController Class