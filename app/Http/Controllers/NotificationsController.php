<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Message\Notifications;


use DB;
use Auth;
use Hash;

class NotificationsController extends Controller {


    public function index() {
        $loops = Notifications::where("user", Auth::id())->get();
        Notifications::where("user", Auth::id())->where("view", "0")->update([
            "view" => "1"
        ]);
        return view("message.notifications", compact("loops"));
    }



    // انشاء حساب موظف
    public function store(Request $request) {
        Notifications::insert([
            "user"       => $request->user,
            "text_ar"    => $request->text_ar,
            "text_en"    => $request->text_en,
            "created"    => date("j, n, Y"),
        ]);
        return back()->with("created", "تم اضافة البيانات بنجاح");
    }


    

    
}
