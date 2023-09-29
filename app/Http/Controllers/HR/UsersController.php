<?php

namespace App\Http\Controllers\HR;

use Illuminate\Http\Request;
use App\Models\HR\User;
use App\Models\Companies;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;

class UsersController extends Controller {

 

  function index($acounts) {
      $acount = User::where("id", Auth::id())->first();
      $data  = User::where("hospital", $acount->hospital)->where("acount", $acounts)->get();
      $companies  = Companies::where("hospital", $acount->hospital)->get();
      return view("hr.users.users", compact("data", "companies"));
  }


  // الملف الشخصي 
  function profile() {
    $profile = User::where("id", Auth::user()->id)->first();
    return view("project.profile", compact("profile"));
  }

    // الملف الشخصي 
    function edit() {
      $profile = User::where("id", Auth::user()->id)->first();
      return view("users.edit", compact("profile"));
    }

  function  store(Request $request) {
    $acount = User::where("id", Auth::id())->first();
    User::insert([
      'name'           => $request->name,
      'phone'          => $request->phone,
      'email'          => $request->email,
      'acount'         => $request->acount,
      'hospital'       => $acount->hospital,
      'text_password'  => $request->password,
      'password'       => Hash::make($request->password),
    ]);
    return back()->with("created", "تم اضافة الحساب بنجاح");
  }



  function  update(Request $request) {


    if($request->picture) :
      $fileExtintion = $request->picture->getclientoriginalextension();
      $fileName = time() . "." . $fileExtintion;
      $path = "public/users";
      $request->picture->move($path, $fileName);
      User::where("id", Auth::user()->id)->update([
        'name'           => $request->edit_name,
        'phone'          => $request->edit_phone,
        'email'          => $request->edit_email,
        'picture'        => $fileName,
        'text_password'  => $request->edit_password,
        'password'       => Hash::make($request->edit_password),
      ]);
    else :
      User::where("id", Auth::user()->id)->update([
        'name'           => $request->edit_name,
        'phone'          => $request->edit_phone,
        'email'          => $request->edit_email,
        'text_password'  => $request->edit_password,
        'password'       => Hash::make($request->edit_password),
      ]);
    endif;

    return back()->with("updated", "تم تحديث البيانات بنجاح");
  }
  





  function delete($id) {
    User::where("id", $id)->delete();
  }





} // ProdactController Class