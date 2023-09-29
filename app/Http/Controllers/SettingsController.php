<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class SettingsController extends Controller {


  function index() {
      $acount = User::where("id", Auth::id())->first();
      $settings  = Settings::where("hospital", $acount->hospital)->first();
      return view("project.settings", compact("settings"));
  }




  function  update(Request $request) {
    $acount = User::where("id", Auth::id())->first();
    $rule = $this->getRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    Settings::where("hospital", $acount->hospital)->update([
      'service_cost'           => $request->service_cost,
      'discount_percentage'    => $request->discount_percentage,
      'taxes'                  => $request->taxes,
      'receive_payments'       => $request->receive_payments,
      'notification_balance'   => $request->notification_balance,
    ]);
    return back()->with("updated", "تم تعديل البيانات  بنجاح");
  }


  // شروط ادخال الحقول
  protected function getRule() {
    return $rule = [
      "service_cost"          => "required|string",
      "discount_percentage"   => "required|string",
      "taxes"                 => "required|string",
      "receive_payments"      => "required|string",
      "notification_balance"  => "required|string",
    ];
  }
        
         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class