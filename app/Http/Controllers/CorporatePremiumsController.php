<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Companies;
use App\Models\CorporatePremiums;


use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class CorporatePremiumsController extends Controller {



  function index($id) {
      $acount = User::where("id", Auth::id())->first();
      $corporate_premiums  = CorporatePremiums::where("company", $id)->get();
      return view("project.corporate_premiums", compact("corporate_premiums"));
  }


  function  store(Request $request) {
    $rule = $this->getRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    CorporatePremiums::insert([
      'company'      => $request->company,
      'agent'        => $request->agent,
      'money'        => $request->money,
      'created'      => $request->created,
    ]);
    $company = Companies::where("id", $request->company)->first();
    Companies::where("id", $request->company)->update([
      'balance'      => $company->balance + $request->money,
    ]);
    return back()->with("created", "تم اضافة القسط  بنجاح");
  }

  


  // شروط ادخال الحقول
  protected function getRule() {
    return $rule = [
      "company"    => "required|string",
      "agent"      => "required|string",
      "money"      => "required|string",
      "created"    => "required|string",
    ];
  }
        
  //   رسائل ادخال الحقول
  protected function getMessage()  {
      return $message = [];
  }
  








} // ProdactController Class