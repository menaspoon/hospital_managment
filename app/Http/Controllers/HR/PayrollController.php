<?php
namespace App\Http\Controllers\HR;
use Illuminate\Http\Request;
use App\Models\HR\User;
use App\Models\HR\Payroll;
use App\Models\Banks;
use App\Models\Message\Notifications;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;
use DB;

class PayrollController extends Controller {
  
  function index() {
      $acount = User::where("id", Auth::id())->first();

      $doctor = User::where("acount", "doctor")->get();
      $nurse  = User::where("acount", "nurse")->get();
      $banks  = Banks::where("hospital", $acount->hospital)->get();

      $data  = Payroll::join("users", "users.id", "=", "payroll.user")
      ->join("banks", "banks.id", "=", "payroll.bank")
      ->select("payroll.*", "users.name as username", "banks.name as bank_name")
      ->where("payroll.hospital", $acount->hospital)->get();
      return view("hr.payroll", compact("data", "doctor", "nurse", "banks"));
  }
  
  function my() {
      $acount = User::where("id", Auth::id())->first();
      $data  = Payroll::where([["hospital", $acount->hospital], ["user", $acount->id]])->get();
      return view("hr.my_vacation", compact("data"));
  }

  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Payroll::join("users", "users.id", "=", "payroll.user")
      ->join("banks", "banks.id", "=", "payroll.bank")
      ->select("payroll.*", "users.name as username", "banks.name as bank_name")
      ->where('payroll.id', $id)->first();
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
    Payroll::insert([
      'user'         => $request->user,
      'wage'         => $request->wage,
      'month'        => $request->month,
      'bank'         => $request->bank,
      'created'      => date("F j, Y, g:i a"),
      'date'         => date("j-n-Y"),
      'hospital'     => $acount->hospital,
    ]);

    $bank = Banks::where("id", $request->bank)->first();
    Banks::where("id", $request->bank)->update([
      "balance" => $bank->balance - $request->wage
    ]);

    Notifications::insert([
      "user"    => $request->user,
      "message" => "تم استلامك للراتب - " . $request->wageك
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
    Vacation::where("id", $request->id)->update([
      'user'         => Auth::id(),
      'start'        => $request->edit_start,
      'end'          => $request->edit_end,
      'reason'       => $request->edit_reason,
      'note'         => $request->edit_note,
      'note_admin'   => $request->edit_note_admin,
      'status'       => $request->edit_status,
    ]);    
  
    if($request->edit_status == "done") :
      $status = " تم الموافقة علي طلب الاجازة  -  " . $request->edit_note_admin;
    elseif($request->edit_status == "rejected") :
      $status = " تم رفض طلب اجازتك  -  " . $request->edit_note_admin;
    else :
      $status = " تم تعليق طلب اجازتك  -  " . $request->edit_note_admin;
    endif;

    $vacation = Vacation::where("id", $request->id)->first();

    Notifications::insert([
      "user"    => $vacation->user,
      "message" => $status
    ]);

    return back()->with("created", "تم تحديث البيانات بنجاح");

  }




  // شروط ادخال الحقول
  protected function storeRule() {
    return $rule = [
      "user"     => "required|string",
      "wage"     => "required|string",
      "month"    => "required|string",
      "bank"     => "required|string",
    ];
  }



  // شروط ادخال الحقول
  protected function updateRule() {
    return $rule = [
      "id"       => "required|string",
      "edit_start"      => "required|string",
      "edit_end"        => "required|string",
      "edit_reason"     => "required|string",
      "edit_note"       => "required|string",
      "edit_status"     => "required|string",
      "edit_note_admin" => "required|string",
  ];
  }
        
         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class