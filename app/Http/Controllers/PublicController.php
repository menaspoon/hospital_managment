<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Auth;
use Hash;
use DB;
class PublicController extends Controller {



  function index() {
      $acount = User::where("id", Auth::id())->first();
      $categories  = Category::where("hospital", $acount->hospital)->get();
      return view("project.categories", compact("categories"));
  }

  function delete(Request $request) {
      DB::table($request->table)->where("id", $request->id)->delete();
  }








} // ProdactController Class