<?php
namespace App\Http\Controllers\Pharmacy;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Pharmacy\Pharmacy;
use App\Models\Banks;
use Auth;
use Hash;
use DB;

class PharmacyController extends Controller {


  function index() {
      $acount = User::where("id", Auth::id())->first();
      $data  = Pharmacy::where("hospital", $acount->hospital)->get();
      return view("pharmacy.index", compact("data"));
  }


  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Pharmacy::where('id', $id)->first();
      return response()->json(["data" => $data]);
    }
  }


  function  store(Request $request) {
    $rule = $this->storeRule();
    $message = $this->storeMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $acount = User::where("id", Auth::id())->first();
    Pharmacy::insert([
      'hospital'         => $acount->hospital,
      'name'             => $request->name,
      'count'            => $request->count,
      'selling_price'    => $request->selling_price,
      'buy_price'        => $request->buy_price,
      'expiration_date'  => $request->expiration_date,
      'how_to_use'       => $request->how_to_use,
    ]);
    return back()->with("updated", "تم اضافة البيانات بنجاح");
  }



  function  update(Request $request) {
    $rule = $this->updateRule();
    $message = $this->storeMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $acount = User::where("id", Auth::id())->first();
    Pharmacy::where("id", $request->id)->update([
      'name'             => $request->edit_name,
      'selling_price'    => $request->edit_selling_price,
      'buy_price'        => $request->edit_buy_price,
      'expiration_date'  => $request->edit_expiration_date,
      'how_to_use'       => $request->edit_how_to_use,
    ]);
    return back()->with("updated", "تم تحديث البيانات بنجاح");
  }

   // شروط ادخال الحقول
  protected function storeRule() {
    return $rule = [
      "name"            => "required|string",
      "count"           => "required|string",
      "selling_price"   => "required|string",
      "buy_price"       => "required|string",
      "expiration_date" => "required|string",
      "how_to_use"      => "required|string",
    ];
  }



  // شروط ادخال الحقول
  protected function updateRule() {
    return $rule = [
      "id"            => "required|string",
      "edit_name"            => "required|string",
      "edit_selling_price"   => "required|string",
      "edit_buy_price"       => "required|string",
      "edit_expiration_date" => "required|string",
      "edit_how_to_use"      => "required|string",
    ];
  }
        
         //   رسائل ادخال الحقول
  protected function storeMessage()  { return $message = []; }
  


} // ProdactController Class