<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banks;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;
use DB;
class BanksController extends Controller {



  function index() {
      $acount = User::where("id", Auth::id())->first();
      $supplier  = Banks::where("hospital", $acount->hospital)->get();
      return view("project.banks", compact("supplier"));
  }

  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Banks::where('id', $id)->first();
      return response()->json(["data" => $data]);
    }
  }


  function  store(Request $request) {
    $rule = $this->storeRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $acount = User::where("id", Auth::id())->first();
    Banks::insert([
      'name'         => $request->name,
      'hospital'     => $acount->hospital,
    ]);
    return back()->with("created", "تم اضافة البيانات بنجاح");
  }




  function  update(Request $request) {
    $rule = $this->updateRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $acount = User::where("id", Auth::id())->first();
    Banks::where("id", $request->id)->update([
      'name'         => $request->edit_name,
    ]);
    return back()->with("created", "تم تحديث البيانات بنجاح");
  }




  // شروط ادخال الحقول
  protected function storeRule() {
    return $rule = [
      "name"       => "required|string",
  ];
  }

  // شروط ادخال الحقول
  protected function updateRule() {
    return $rule = [
      "id"       => "required|string",
      "edit_name"       => "required|string",
  ];
  }
        
         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class