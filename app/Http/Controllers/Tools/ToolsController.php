<?php
namespace App\Http\Controllers\Tools;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tools\Tools;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;
use DB;
class ToolsController extends Controller {

  function index() {
      $acount = User::where("id", Auth::id())->first();
      $tools  = Tools::where("hospital", $acount->hospital)->get();
      return view("tools.index", compact("tools"));
  }

  function edit(Request $request) {
    if($request->ajax()) {
      $id = $request->get('id');
      $data = Tools::where('id', $id)->first();
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
    Tools::insert([
      'name'         => $request->name,
      'count'        => $request->count,
      'hospital'     => $acount->hospital,
    ]);
    return back()->with("created", "تم اضافة البيانات بنجاح");
  }

  function  extraction(Request $request) {
    $rule = $this->extractionRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $count = Tools::where("id", $request->countToolID)->first();
    $acount = User::where("id", Auth::id())->first();
    Tools::where("id", $request->countToolID)->update([
      'count'        => $request->countTool - $count,
    ]);
    echo $request->countTool - $count;
    //return back()->with("created", "تم اضافة البيانات بنجاح");
  }

  

  function  update(Request $request) {
    $rule = $this->updateRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $acount = User::where("id", Auth::id())->first();
    Tools::where("id", $request->id)->update([
      'name'         => $request->edit_name,
    ]);
    return back()->with("created", "تم تحديث البيانات بنجاح");
  }




  // شروط ادخال الحقول
  protected function storeRule() {
    return $rule = [
      "name"       => "required|string",
      "count"      => "required|string",
    ];
  }

    // شروط ادخال الحقول
  protected function extractionRule() {
      return $rule = [
        "countToolID" => "required|string",
        "countTool"      => "required|string",
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