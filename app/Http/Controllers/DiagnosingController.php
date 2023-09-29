<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Recepion;
use App\Models\Diagnosing\Diagnosing;
use App\Models\Diagnosing\DiagnosingDetails;
use App\Models\Diagnosing\DiagnosingPicture;
use App\Models\Diagnosing\DiagnosingFiles;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class DiagnosingController extends Controller {


  function index($members) {
      $acount = User::where("id", Auth::id())->first();
      
      $data = DiagnosingDetails::join("users", "users.id", "=", "diagnosing_details.doctor")
      ->select("diagnosing_details.*", "users.name as doctor_name")
      ->where("members", $members)->get();
      $files = DiagnosingFiles::where("member", $members)->get();
      return view("project.diagnosing", compact("data", "files"));
  }


  function  store(Request $request) {
    /*
    $acount = User::where("id", Auth::id())->first();
    $rule = $this->getRule();
    $message = $this->getMessage();

    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    */
    $acount = User::where("id", Auth::id())->first();
    $isset  = Diagnosing::where("members", $request->user_id)->first();
    if(!$isset) :
        Diagnosing::insert([
            'members'      => $request->user_id,
            'hospital'     => $acount->hospital,
        ]);
    endif;

    DiagnosingDetails::insert([
        'members'      => $request->user_id,
        'invoice'      => $request->invoice,
        'text'         => $request->text,
        'doctor'       => $acount->id,
        'hospital'     => $acount->hospital,
        'created'      => date("j, n, Y"),
    ]);

    $diagnosing_details = DiagnosingDetails::orderBy("id", "DESC")->first();

    if ($request->hasfile('pictures')) {
      $images = $request->file('pictures');
      foreach($images as $image) {
        $fileExtintion = $image->getclientoriginalextension();
         $fileName = md5(mt_rand(0, 32) . time()) . "." . $fileExtintion;
        $path = "public/diagnosin";
        $image->move($path, $fileName);
        DiagnosingPicture::insert([
          'member'      => $request->user_id,
          'invoice'      => $request->invoice,
          'diagnosing_details'         => $diagnosing_details->id,
          'photo'         => $fileName,
          'hospital'     => $acount->hospital,
      ]);
      }
    }

    if ($request->hasfile('files')) {
      $images = $request->file('files');
      
      foreach($images as $image) {
        $fileExtintion = $image->getclientoriginalextension();
        $fileName = md5(mt_rand(0, 32) . time()) . "." . $fileExtintion;
        $path = "public/diagnosin/files";
        $image->move($path, $fileName) ;
        DiagnosingFiles::insert([
          'member'      => $request->user_id,
          'invoice'      => $request->invoice,
          'diagnosing_details'         => $diagnosing_details->id,
          'file'         => $fileName,
          'hospital'     => $acount->hospital,
      ]);
      }
    }

    //return back()->with("created", "تم اضافة القســــم بنجاح");
  }


  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Category::where('id', $id)->first();
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
    Category::where("id", $request->id)->update([
      'name'         => $request->edit_name,
    ]);
    return back()->with("updated", "تم تعديل البيانات  بنجاح");
  }


          // شروط ادخال الحقول
          protected function getRule() {
            return $rule = [
              "name"       => "required|string",
            ];
          }
        
         //   رسائل ادخال الحقول
          protected function getMessage()  {
            return $message = [];
          }
  








} // ProdactController Class