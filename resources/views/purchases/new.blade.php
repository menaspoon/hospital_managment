@extends('master')
@section('content')
<title> فاتورة جديدة </title>

<style>


.new-invoice h2 {
    text-align: center;
    color: #000;
    margin-bottom: 50px;
}

.table>:not(caption)>*>* {
    padding: 5px;
}

.table input, .table select {
    border-radius: 0px;
    padding: 10px;
}


.container {
    background: #fff;
    padding: 50px;
}

</style>


<div class="container new-invoice">
  <form method="POST" action="{{ route('store.purchases.pharmacy')}}">
    <h2> فاتورة جديدة </h2>
    @if (Session::has("created"))
      <div class="alert alert-success text-center" role="alert">
        {{ Session::get("created") }}
      </div>
    @endif
    @csrf
    <div class="row">
      <div class="col-md-4">
        <label for="">اسم العميل</label>
        <select required name="supplier" class="form-control">
          <option value="">اسم المورد</option>

        </select>
      </div>
      <div class="col-md-4">
        <label for=""> تاريخ اصدار الفاتورة </label>
        <input required type="date" class="form-control">
      </div>
      <div class="col-md-4">
        <label for=""> نوع الفاتورة </label>
        <select name="invoice_type" id="" class="form-control">
          <option value="purchases"> فاتورة مشتريات </option>
          <option value="return_purchases"> فاتورة  مرتجع مشتريات </option>
        </select>
      </div>
    </div>

<br><br>
    <div class="box-fatora">
      <table class="table" id="invoice_detales">
        <thead>
          <tr>
            <th>#</th>
            <th>الوصف (المنتج، الخدمة،السلعة)	</th>
            <th>السعر</th>
            <th>العدد</th>
            <th>الاجمالي</th>
          </tr>
        </thead>
        <tbody>
          <tr class="invoice_parent_row">
            <td>#</td>
            <td>
              <select name="product[]" id="product"  class="product form-control" id="">
                <option value="">حدد المنتج</option>
                @foreach ($pharmacy as $item)
                  <option  value="{{ $item->id }}" data-count="{{ $item->count }}" > {{ $item->name }} </option>
                @endforeach
              </select>
            </td>
            <td>
              <input  type="number" name="price[]" id="price" class="price form-control">
            </td>
            <td>
              <input type="number" name="count[]" id="count" class="count form-control">
            </td>
            <td>
              <input type="number" name="subtotal[]" id="subtotal" class="subtotal form-control" readonly>
            </td>
          </tr>
        </tbody>

        <thead>
          <tr>
            <td colspan="3"><button type="button" class="btn btn-primary new_row"> صف جديد </button></td>
            <td>
              <select name="operation_type" id="" class="form-control">
                <option value="0">نوع العملية</option>
                <option value="اجل"> اجل </option>
                <option value="مدفوع"> مدفوع </option>
                <option value="جزئي"> جزئي </option>
              </select>
            </td>
            <td> <input  type="text" name="paid_up" id="" class="form-control"> </td>
          </tr>
          <tr>
            <td colspan="3"></td>
            <td>
              <select name="discount_type" id="discount_type" class="form-control">
                <option value="0">نوع الخصم</option>
                <option value="percentage"> نسبة مؤية </option>
                <option value="money">  مبلغ  </option>
              </select>
            </td>
            <td> <input  type="number" name="discount_val" id="discount_val" class="form-control"> </td>
          </tr>


        </thead>

      </table>

      <br><br>

      <table>
        <tr>
          <th> الناتج </th>
          <th> القيمة المضافة </th>
          <th> احمالي الناتج </th>
          <th>  الخزينة </th>
        </tr>
        <tr>
          <td> <input type="text" id="all_title" placeholder="0.00" class="form-control" readonly=""> </td>
          <td> <input type="text" id="vat_value" placeholder="0.00" class="form-control" readonly=""> </td>
          <td> <input type="text" id="total_due" name="total_due" placeholder="0.00" class="form-control" > </td>
          <td>
            <select name="bank" id="bank" class="form-control">
              <option value="0">البنك</option>
              @foreach ($banks as $item)
                <option value="{{ $item->id }}"> {{ $item->name }} </option>
              @endforeach
            </select>
          </td>
        </tr>
      </table>

    </div>

      <br>

      <button type="submit" class="btn btn-success"> حفظ الفاتورة  </button>
    </tr>

    


    
    

  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
      $(document).on("click", ".new_row", function () {
      $("#invoice_detales").find("tbody").append("<tr>" + $(".invoice_parent_row").html() + "</tr>");
    });
</script>





<script>
  $(document).ready(function(){
    
    $("#invoice_detales").on("keyup blur", ".price", function () {
      let $row = $(this).closest("tr");
      let price = $row.find(".price").val() || 0;
      let count = $row.find(".count").val() || 0;
      $row.find(".subtotal").val((price * count).toFixed(2));

      $("#all_title").val(all_title("#all_title"))
      $("#vat_value").val(collect_flag())
      $("#total_due").val(sum_do_total())

    });

    $("#invoice_detales").on("keyup blur", ".count", function () {
      let $row = $(this).closest("tr");
      let price = $row.find(".price").val() || 0;
      let count = $row.find(".count").val() || 0;
      $row.find(".subtotal").val((price * count).toFixed(2));
      $("#all_title").val(all_title(".subtotal"))
      $("#vat_value").val(collect_flag())
      $("#total_due").val(sum_do_total())

    });


    $("#invoice_detales").on("keyup blur", "#discount_type", function () {
      $("#vat_value").val(collect_flag())
      $("#total_due").val(sum_do_total())
    });

    $("#invoice_detales").on("keyup blur", "#discount_value", function () {
      $("#vat_value").val(collect_flag())
      $("#total_due").val(sum_do_total())
    });

    $("#invoice_detales").on("keyup blur", ".shipping", function () {
      $("#vat_value").val(collect_flag())
      $("#total_due").val(sum_do_total())
    });

    
    $("#invoice_detales").on("keyup blur", "#discount_val", function () {
      $("#vat_value").val(collect_flag())
      $("#total_due").val(sum_do_total())
      console.log(this.value);
    });

    let all_title = function($selector) {
      let sum = 0;
      $($selector).each(function () {
        let selectorval = $(this).val() != "" ? $(this).val() : 0;
        sum += parseFloat(selectorval);
      });
      return sum.toFixed(2)
    }




    let collect_flag = function () {
      let all_title     =  $("#all_title").val() || 0;
      let discount_type =  parseFloat($("#discount_type").val()) || 0;
      let discount_val  =  parseFloat($("#discount_val").val()) || 0;
      let discountVal  =  parseFloat($("#discount_val").val()) || 0;
      

      $('#discount_type').on('change', function() {
        if(discount_val != 0) {
            if(this.value == "percentage") {
              discountVal = all_title * (discount_val / 100)
            } else {
              discountVal = discount_val
              console.log(discountVal);
            } // discount_type == "percentage"
        } else {
          discountVal = 0
        } // discount_val != 0
      });

      let vatVal = (all_title - discountVal) * 0.05;
      return vatVal.toFixed(2)

    }



    let sum_do_total = function () {
      let sum = 0;
      let all_title     =  $("#all_title").val() || 0;
      let discount_type =  parseFloat($("#discount_type").val()) || 0;
      let discount_val  =  parseFloat($("#discount_val").val()) || 0;
      let discountVal  =  parseFloat($("#discount_val").val()) || 0;

      $('#discount_type').on('change', function() {
        if(discount_val != 0) {
            if(this.value == "percentage") {
              discountVal = all_title * (discount_val / 100)
            } else {
              discountVal = discount_val
              console.log(discountVal);
            } // discount_type == "percentage"
        } else {
          discountVal = 0
        } // discount_val != 0
      });

      let vatVal = parseFloat($("#vat_value").val()) || 0;
      let shipping = $(".shipping").val() || 0;

      sum += all_title;
      sum -= discountVal;
      sum += vatVal;
      sum += shipping;
      return sum.toFixed(2)


    }    



  });


</script>


@endsection
