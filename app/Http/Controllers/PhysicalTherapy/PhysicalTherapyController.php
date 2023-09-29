<?php

namespace App\Http\Controllers\PhysicalTherapy;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PhysicalTherapy\PhysicalTherapy;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class PhysicalTherapyController extends Controller {



  function index($category) {
      $acount = User::where("id", Auth::id())->first();
      $data  = PhysicalTherapy::where("category", $category)->get();
      return view("physical_therapy.physical_therapy", compact("data"));
  }


  function  store(Request $request) {
    $acount = User::where("id", Auth::id())->first();
    $rule = $this->getRule();
    $message = $this->getMessage();

    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    PhysicalTherapy::insert([
      'name'         => $request->name,
      'price'        => $request->price,
      'category'     => $request->category,
      'status'        => $request->status,
    ]);
    return back()->with("created", "تم اضافة القســــم بنجاح");
  }



  
  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = PhysicalTherapy::where('id', $id)->first();
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
    PhysicalTherapy::where("id", $request->id)->update([
      'name'         => $request->edit_name,
      'price'        => $request->edit_price,
      'status'        => $request->edit_status,
    ]);
    return back()->with("updated", "تم تعديل البيانات  بنجاح");
  }


  // شروط ادخال الحقول
  protected function getRule() {
    return $rule = [
      "name"       => "required|string",
      "price"       => "required|string",
      "category"       => "required|string",
    ];
  }
  
  // شروط ادخال الحقول
  protected function editRule() {
    return $rule = [
      "edit_name"       => "required|string",
      "edit_price"      => "required|string",
      "id"              => "required|string",
      //"status"       => "required|string",
    ];
  }    
  //   رسائل ادخال الحقول
  protected function getMessage()  {
      return $message = [];
  }
  








} // ProdactController Class