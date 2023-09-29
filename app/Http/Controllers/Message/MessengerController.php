<?php

namespace App\Http\Controllers\Message;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\Chat\Messenger;
use App\Models\Chat\ChatAd;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class MessengerController extends Controller {

// https://www.freepik.com/free-psd/back-social-media-post-web-banner-template_22741443.htm#query=web%20templates&position=14&from_view=search
    
    public function all() {
        $auth = Auth::id();


        $ChatAd = ChatAd::where("user", $auth)
                     ->orWhere("responsible", $auth)
                     //->join("offer", "offer.id", "=", "chat_ad.ad")
                     ->join("users", "users.id", "=", "chat_ad.user")
                     ->select("users.name as username", "users.picture as avatar", "chat_ad.*")
                     ->get();
        return view("project.all_messenger", compact("ChatAd"));
        
    }


    public function index($user, $responsible, $ad) {

      // التاكد من وجود محادثة باسم الاعلان والمستخدم
      $isSet = ChatAd::where("user", $user)
                     ->where("responsible", $responsible)
                     ->where("ad", $ad)->count();
      //if($isSet == 0) :
      //  ChatAd::insert([
      //      "user"         => $user,
      //      "responsible"  => $responsible,
      //      "ad"           => $ad,
      //  ]); 
      // endif;
      
      $auth = Auth::id();


        $ChatAd = ChatAd::where("user", $auth)
                     ->orWhere("responsible", $auth)
                    // ->join("offer", "offer.id", "=", "chat_ad.ad")
                     ->join("users", "users.id", "=", "chat_ad.user")
                     ->select("users.name as username", "chat_ad.*")
                     ->get();
      
      if(Auth::user()->id == $user) :
        $user_offer = User::where("id", $responsible)->first();
      else :
        $user_offer = User::where("id", $user)->first();
      endif;

      // استدعاء المحادثة
      $chat = Messenger::where("user", $user)
                       ->where("responsible", $responsible)
                       ->where("ads", $ad)->get();
      return view("project.messenger", compact("chat", "ChatAd", "user_offer"));
    }



    function allMessage(Request $request) {
      // استدعاء المحادثة
      $data = Messenger::where("user", $request->user)
      ->where("responsible", $request->responsible)
      ->where("ads", $request->ad)->get();

      $auth = Auth::id();

      //  تحديث المشاهدة
      Messenger::where("user_view", $auth)->update([
          "view"       => "1",
      ]);

      foreach($data as $item) :
        $viewIcon = ($item->view == 1) ? "<div class='view'>" . '<i class="fas fa-check"></i><i class="fas fa-check"></i>' . "</div>" : "";
        if($auth == $item->sender) :
          echo "<div>";
            echo  "<strong style='float:right; background:#1266f1; color:#fff'>" . $item->message . 
            $viewIcon
            . "</strong></br></br>";
          echo  "</div>";
        else :
          echo "<div>";
            echo  "<strong style='float:left'>" . $item->message . $viewIcon . "</strong></br></br>";
          echo  "</div>";
        endif;
      endforeach;
    }
  





    // انشاء قسم
    public function store(Request $request) {
        //$rule = $this->getRule();
        //$message = $this->getMessage();
    
        //$validator = Validator::make($request->all(), $rule, $message);
        //if($validator->fails()) {
        //  return redirect()->back()->withErrors($validator)->withInput($request->all());
        //  return back()->with("validator", "يرجي التاكد من الحقول");
        //}

        // التاكد من وجود محادثة باسم الاعلان والمستخدم
        $isSet = ChatAd::where("user", $request->user)
                       ->where("responsible", $request->responsible)
                       ->where("ad", $request->ad)->count();
        if($isSet == 0) :
          ChatAd::insert([
              "user"         => $request->user,
              "responsible"  => $request->responsible,
              "ad"           => $request->ad,
          ]); 
        endif;

        $sender = Auth::user()->id;
        if($sender == $request->user) :
          $user_view = $request->responsible;
        else :
          $user_view = $request->user;
        endif;

        Messenger::insert([
            "ads"          => $request->ad,
            "user"         => $request->user,
            "responsible"  => $request->responsible,
            "message"      => $request->message,
            "sender"       => $sender,
            "user_view"     => $user_view,
        ]);
        //return back()->with("created", "تم اضافة القسم  بنجاح");
    }

    
    // تحديث البيانات 
    public function update(Request $request) {
        SubCategory::where("id", $request->id)->update([
            "name_ar"       => $request->edit_name_ar,
            "name_en"       => $request->edit_name_en,
        ]);
        return back()->with("updated", "تم تحديث البيانات بنجاح");
    }


 


        




    function edit(Request $request) {
        if($request->ajax()) {
          $id = $request->get('id');
          $data = SubCategory::where('id', $id)->first();
          return response()->json(["data" => $data]);
        }
    }




        // شروط ادخال الحقول
        protected function getRule() {
          return $rule = [
            "name_ar"      => "required|string",
            "name_en"      => "required|string",
            "category"     => "required|string",
          ];
        }
      
       //   رسائل ادخال الحقول
        protected function getMessage()  {
          return $message = [
            "name_ar.required"    => __("يرجي ملئ الحقل "),
            "name_en.required"    => __("يرجي ملئ الحقل "),
            "category.required"   => __("يرجي ملئ الحقل "),
          ];
        }

    
}
