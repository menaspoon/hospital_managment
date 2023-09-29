<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;
use DB;
class SupplierController extends Controller {



  function index() {
      $acount = User::where("id", Auth::id())->first();
      $supplier  = Supplier::where("hospital", $acount->hospital)->get();
      return view("project.supplier", compact("supplier"));
  }

  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Supplier::where('id', $id)->first();
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
    Supplier::insert([
      'name'         => $request->name,
      'email'        => $request->email,
      'phone'        => $request->phone,
      'address'      => $request->address,
      'hospital'     => $acount->hospital,
      'discount_percentage' => $request->discount_percentage,
    ]);
    return back()->with("created", "تم تحديث البيانات بنجاح");
  }




  function  update(Request $request) {
    $rule = $this->updateRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $acount = User::where("id", Auth::id())->first();
    Supplier::where("id", $request->id)->update([
      'name'         => $request->edit_name,
      'email'        => $request->edit_email,
      'phone'        => $request->edit_phone,
      'address'      => $request->edit_address,
    ]);
    return back()->with("created", "تم تحديث البيانات بنجاح");
  }




  // شروط ادخال الحقول
  protected function storeRule() {
    return $rule = [
      "name"       => "required|string",
      "email"      => "required|string",
      "phone"      => "required|string",
      "address"    => "required|string",
      "discount_percentage"   => "required|string",
  ];
  }

  // شروط ادخال الحقول
  protected function updateRule() {
    return $rule = [
      "id"       => "required|string",
      "edit_name"       => "required|string",
      "edit_email"      => "required|string",
      "edit_phone"      => "required|string",
      "edit_address"    => "required|string",
  ];
  }
        
         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class