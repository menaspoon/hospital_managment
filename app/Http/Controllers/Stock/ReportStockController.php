<?php

namespace App\Http\Controllers\Stock;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stock\Products;
use App\Models\Stock\ProductsReceive;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Auth; 
use Hash;

class ReportStockController extends Controller {

  function public(Request $request) {
    if($request->start) :
      $start = $request->start; $end = $request->end;
    else :
      $start = 0; $end = 0;
    endif;
    $acount = User::where("id", Auth::id())->first();
    $data  = ProductsReceive::join("products", "products.id", "=", "product_receive.product")
    ->select("product_receive.*", "products.name")
    ->where([["product_receive.hospital", $acount->hospital], ['product_receive.date_filter', '>=', $start], ['product_receive.date_filter', '<=', $end]])->get();
    return view("stock.reports_public", compact("data"));
}



  function  transformation(Request $request) {
    $rule = $this->updateRule();
    $message = $this->getMessage();
    $validator = Validator::make($request->all(), $rule, $message);
    if($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput($request->all());
    }
    $acount = User::where("id", Auth::id())->first();
    $products = Products::where("id", $request->product)->first();
    
    if($request->type == "to_hospital") :
        Products::where("id", $request->product)->update([
            'count_stock'         => $products->count_stock - $request->count,
            'count_hospital'      => $products->count_hospital + $request->count,
        ]);
    endif;

    if($request->type == "to_store") :
        Products::where("id", $request->product)->update([
            'count_stock'         => $products->count_stock + $request->count,
            'count_hospital'      => $products->count_hospital - $request->count,
        ]);
    endif;
    return back()->with("created", "تم تحديث البيانات بنجاح");
  }


  function  receiveProdact(Request $request) {
    $acount = User::where("id", Auth::id())->first();
    for ($i = 0; $i < count($request->product); $i++) :
        ProductsReceive::insert([
            'product'      => $request->product[$i],
            'count'        => $request->count[$i],
            'recipient'    => $request->recipient,
            'sender'       => Auth::id(),
            'date_filter'  => date("Y-m-d"),
            'created'      => date("F j, Y, g:i a"),
            'hospital'     => $acount->hospital,
        ]);
        $product = Products::where("id", $request->product[$i])->first();
        if($request->type == "hospital") :
            Products::where("id", $request->product[$i])->update([
                'count_hospital'      => $product->count_hospital + $request->count[$i],
            ]);
        endif;
        if($request->type == "store") :
            Products::where("id", $request->product)->update([
                'count_stock'         => $product->count_stock + $request->count[$i],
            ]);
        endif;
    endfor;

    return back()->with("created", "تم اضافة البيانات بنجاح");
  }


  // شروط ادخال الحقول
  protected function updateRule() {
    return $rule = [
      "product"     => "required|string",
      "count"       => "required|string",
      "type"        => "required|string",
  ];
  }
  protected function getMessage()  {
    return $message = [];
}

}


