<?php
namespace App\Http\Controllers\Tools;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Tools\Tools;
use App\Models\Tools\ToolsPurchases;
use App\Models\Tools\ToolsPurchasesDetails;
use App\Models\Supplier;
use App\Models\Banks;
use App\Models\Settings;
use Auth;
use Hash;
use DB;

class ToolsPurchasesController extends Controller {


  function index() {
      $acount = User::where("id", Auth::id())->first();
      $data  = ToolsPurchases::where("hospital", $acount->hospital)->paginate();
      return view("tools.purchases", compact("data"));
  }


  public function invoice_detales($id) {
    $setting = Settings::where("hospital", Auth::user()->hospital)->first();
    $purchases = InvoiceBuyingMedicines::where("id", $id)->first();
    $invoice_detales = InvoiceDetalesBuyingMedicines::join("pharmacy", "pharmacy.id", "=", "invoice_detales_buying_medicines.product")
    ->select("pharmacy.*", "invoice_detales_buying_medicines.*")
    ->where("invoice_id", $id)->get();
    // استرجاع الفواتير
    return view("pharmacy.invoice_detales", compact("purchases", "invoice_detales"));
}


  function create() {
      $acount = User::where("id", Auth::id())->first();
      $supplier  = Supplier::where("hospital", $acount->hospital)->get();
      $banks  = Banks::where("hospital", $acount->hospital)->get();
      $tools  = Tools::where("hospital", $acount->hospital)->get();
      return view("tools.create", compact("tools", "banks", "supplier"));
  }


    // انشـــاؤ فاتورة جديدة
    function  store(Request $request) {
      // انشـــاؤ فاتورة جديدة
      ToolsPurchases::insert([
          "invoice_type"      => $request->invoice_type,
          "supplier"          => $request->supplier,
          "created"           => $request->created,
          "discount"          => $request->discount,
          "operation_type"    => $request->operation_type,
          "paid_up"           => $request->paid_up,
          "total_due"         => $request->total_due,
          "hospital"          => Auth::user()->hospital,
          "user_id"           => Auth::user()->id,
      ]);

      // استرجاع اخر فاتورة باستخدام رقم الشركة ورفم المستخدم
      $purchases = ToolsPurchases
                     ::where("hospital", Auth::user()->hospital)
                     ->where("user_id", Auth::user()->id)
                     ->orderBy('id', 'DESC')
                     ->first();

echo $purchases->id;
      // ادخال تفاصيل الفاتورة
      for ($i = 0; $i < count($request->product); $i++) { 
          $InvoiceDetales = [
              "product"      => $request->product[$i],
              "count"        => $request->count[$i],
              "price"        => $request->price[$i],
              "invoice_id"   => $purchases->id,
              "hospital"     =>Auth::user()->hospital,
          ];
          ToolsPurchasesDetails::insert($InvoiceDetales);
      }

      // تحديد عدد المنتجات
      if ($request->invoice_type == "purchases") :
          for ($i = 0; $i < count($request->product); $i++) { 
              $count = Tools::where("id", $request->product[$i])->first();
              Tools::where('id', $request->product[$i])->update([
                  'count'         => intval($request->count[$i])  +  intval($count->count),
              ]);  
          } // end for
      else :
          for ($i = 0; $i < count($request->product); $i++) { 
              $count = Tools::where("id", $request->product[$i])->first();
              Tools::where('id', $request->product[$i])->update([
                  'count'         => intval($request->count[$i])  -  intval($count->count),
              ]);  
          } // end for
      endif;
          


      // تحديث رصيد المورد في حالة كان الدفع جزئي
      if($request->operation_type == "جزئي") :
          // الحصول علي رصيد المورد
          $blounce = Supplier::where("id", $request->supplier)->first();
          // الحصول علي رصيد البنك
          $bank = Banks::where("id", $request->bank)->first();
          // طرح مبلغ الفاتورة من الجزء المدفوع
          $paid = intval($request->total_due) - intval($request->paid_up);
          // تحديث رصيد المورد
          if ($request->invoice_type == "purchases") :
            Supplier::where('id', $request->supplier)->update([
                  'balance'         => intval($blounce->money) + intval($paid),
              ]);
          else :
            Supplier::where('id', $request->supplier)->update([
                  'balance'         => intval($blounce->money) - intval($paid),
              ]);
          endif;

          // تحديث رصيد البنك
          if ($request->invoice_type == "purchases") :
            Banks::where('id', $request->bank)->update([
                  'bounce'         => intval($bank->money) - intval($request->paid_up),
              ]);  
          else :
            Banks::where('id', $request->bank)->update([
                  'bounce'         => intval($bank->money) + intval($request->paid_up),
              ]);  
          endif;


      endif;






              // تحديث رصيد المورد في حالة كان الدفع جزئي
      if($request->operation_type == "جزئي") :
          // الحصول علي رصيد المورد
          $blounce = Supplier::where("id", $request->supplier)->first();
          // الحصول علي رصيد البنك
          $bank = Banks::where("id", $request->bank)->first();
          // طرح مبلغ الفاتورة من الجزء المدفوع
          $paid = intval($request->total_due) - intval($request->paid_up);
          // تحديث رصيد المورد
          if ($request->invoice_type == "purchases") :
            Supplier::where('id', $request->supplier)->update([
                  'balance'         => intval($blounce->money) + intval($paid),
              ]);
          else :
            Supplier::where('id', $request->supplier)->update([
                  'balance'         => intval($blounce->money) - intval($paid),
              ]);
          endif;

          // تحديث رصيد البنك
          if ($request->invoice_type == "purchases") :
            Banks::where('id', $request->bank)->update([
                  'bounce'         => intval($bank->money) - intval($request->paid_up),
              ]);  
          else :
            Banks::where('id', $request->bank)->update([
                  'bounce'         => intval($bank->money) + intval($request->paid_up),
              ]);  
          endif;


          /*
          // انشـــاؤ فاتورة جديدة
          DB::table('bank_history')->insert([
              "operation_type"    => "جزئي",
              "created"           => date("j, n, Y, g:i a"),
              "money"             => intval($request->paid_up),
              "invoice"           => "فاتورة مشتريات",
              "company_id"        => Auth::user()->company_id,
          ]);
          */
          
      endif;



      // تحديث رصيد المورد في حالة كان الدفع جزئي
      if($request->operation_type == "مدفوع") :
          // الحصول علي رصيد المورد
          $blounce = Supplier::where("id", $request->supplier)->first();
          // الحصول علي رصيد البنك
          $bank = Banks::where("id", $request->bank)->first();
          // طرح مبلغ الفاتورة من الجزء المدفوع
          // تحديث رصيد المورد
          if ($request->invoice_type == "purchases") :
            Supplier::where('id', $request->supplier)->update([
                  'balance'         => intval($blounce->balance) - intval($request->total_due),
              ]);
          else :
            Supplier::where('id', $request->supplier)->update([
                  'balance'         => intval($blounce->money) + intval($request->total_due),
              ]);
          endif;

          // تحديث رصيد البنك
          if ($request->invoice_type == "purchases") :
            Banks::where('id', $request->bank)->update([
                  'bounce'         => intval($bank->bounce) - intval($request->total_due),
              ]);  
          else :
            Banks::where('id', $request->bank)->update([
                  'bounce'         => intval($bank->bounce) + intval($request->total_due),
              ]);  
          endif;

      endif;

      // تحديث رصيد المورد في حالة كان الدفع اجل
      if($request->operation_type == "اجل") :
          // الحصول علي رصيد المورد
          $blounces = Supplier::where("id", $request->supplier)->first();
          // تحديث رصيد المورد
          if ($request->invoice_type == "purchases") :
            Supplier::where('id', $request->supplier)->update([
                  'balance'      => intval($blounce->balance) + intval($request->total_due),
              ]); 
          else :
            Supplier::where('id', $request->supplier)->update([
                  'balance'         => intval($blounce->balance) - intval($request->total_due),
              ]);  
          endif;

      endif;



      return back()->with("created", "تم انشاء الفاتورة بنجاح");

  }



   // شروط ادخال الحقول
  protected function storeRule() {
    return $rule = [
      "name"            => "required|string",
      "count"           => "required|string",
      "selling_price"   => "required|string",
      "buy_price"       => "required|string",
      "expiration_date" => "required|string",
      "how_to_use"      => "required|string",
    ];
  }
        
         //   رسائل ادخال الحقول
  protected function storeMessage()  { return $message = []; }
  


} // ProdactController Class