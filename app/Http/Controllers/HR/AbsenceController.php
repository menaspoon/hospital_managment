<?php

namespace App\Http\Controllers\HR;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Absence;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Auth; 
use Hash;

class AbsenceController extends Controller {

  function index($acounts) {
    $acount = User::where("id", Auth::id())->first();
    $data  = User::where("hospital", $acount->hospital)->where("acount", $acounts)->get();
    //$companies  = Companies::where("hospital", $acount->hospital)->get();
    return view("absence.users", compact("data"));
  }

  function absence_fillter (Request $request) {
    if($request->start) :
      $start = $request->start; $end = $request->end; $user = $request->user; $status = $request->status; $request->user;
    else :
      $start = 0; $end = 0; $user = 0; $status = 0; $user = 0;
    endif;

    $users = User::get();
    if($request->start) :
      $data  = Absence::join("officer", "officer.id", "absence.user")->where([["date", ">=", $start], ["date", "<=", $end], ["status", $status]])->get();
    else :
      $data  = Absence::where([["date", ">=", $start], ["date", "<=", $end], ["status", $status], ["user", $user]])->get();
    endif;

    return view("clinic.absence_fillter", compact("users", "data"));
  }


  function  plus(Request $request) {
    $absence = Absence::where([["user", $request->id],["status", "plus"],["date", date("Y-m-d")]])->first();
    if(!$absence) :
      Absence::insert([
        'user'            => $request->id,
        'status'          => "plus",
        "attendance_time" => date("F j, Y, g:i a"),
        'date'            => date("Y-m-d"),
      ]);
      $data = "succsess";
      return response()->json(["data" => $data]);
    else :
      $data = "faild";
      return response()->json(["data" => $data]);
    endif;
  }

  function  minus(Request $request) {
    $absence = Absence::where([["user", $request->id],["status", "plus"],["date", date("Y-m-d")]])->first();
    if(!$absence) :
      Absence::insert([
        'user'           => $request->id,
        'status'        => "minus",
        "attendance_time" => date("F j, Y, g:i a"),
        'date'           => date("Y-m-d"),
      ]);
    endif;
    return back()->with("created", "تم اضافة الحساب بنجاح");
  }

  function  departure(Request $request) {
    $absence = Absence::where([["user", $request->id],["status", "plus"],["date", date("Y-m-d")]])->first();
    if($absence) :
      Absence::where("id", $absence->id)->update([
        'departure'        => "go",
        "time_departure"   => date("F j, Y, g:i a"),
      ]);
    endif;
    return back()->with("created", "تم اضافة الحساب بنجاح");
  }


  function  vacation(Request $request) {
    $absence = Absence::where([["user", $request->id],["status", "plus"],["date", date("Y-m-d")]])->first();
    if(!$absence) :
      Absence::insert([
        'user'            => $request->id,
        'status'          => "vacation",
        //"attendance_time" => date("F j, Y, g:i a"),
        'date'            => date("Y-m-d"),
      ]);
    endif;
    return back()->with("created", "تم اضافة الحساب بنجاح");
  }


  function  overtime(Request $request) {
    $absence = Absence::where([["user", $request->user_overtime],["status", "plus"],["date", date("Y-m-d")]])->first();
    if($absence) :
      Absence::where("id", $absence->id)->update([
        'user'            => $request->user_overtime,
        'overtime'        => $request->overtime,
      ]);
    endif;
    //return back()->with("created", "تم اضافة الحساب بنجاح");
  }


  

} // ProdactController Class