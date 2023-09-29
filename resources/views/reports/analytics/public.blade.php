@extends('master')
@section('content')

<div class="companies container-fuild">


<form action="{{ url('report.analytics.public') }}">
  <div class="row">
    <div class="col-md-6">
      <label for="">بداية التاريخ</label>
      <input type="date" name="start" class="form-control">
    </div>
    <div class="col-md-6">
      <label for="">نهاية التاريخ</label>
      <input type="date" name="end" class="form-control">
    </div>
    <div class="col-md-12">
      <br>
      <button style="width:100%" class="btn btn-primary"> بحث </button>
    </div>
  </div>
</form>


{{-- 
<div class="dashbord">
  <div class="counts">
    <div class="row">
      <div class="col-md-2">
        <div class="box" style="background:#EE5A24">
          <span>الحجــــز</span>
          <strong> {{ $count_all }} <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#009432">
          <span>الحجــــز العام</span>
          <strong>4 <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#0652DD">
          <span>حجــــز التامين</span>
          <strong>4 <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#1B1464">
          <span> قوائم الانتظار </span>
          <strong>4 <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#ccae62">
          <span>  تم الانتهاء </span>
          <strong>4 <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#227093">
          <span>   حجز اونلاين </span>
          <strong>4 <b>مرضــي</b> </strong>
        </div>
      </div>
    </div>
  </div>
</div>
--}}



<br><br>
@if ($insurance)
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">رقم الروشتة</th>
      <th scope="col">الشركة</th>
      <th scope="col">المريض</th>
      <th scope="col">التحليل</th>
      <th scope="col">الدكتور</th>
      <th scope="col">السعر</th>
      <th scope="col">الحالة</th>
      <th scope="col">ميعاد الحجز</th>
    </tr>
  </thead>
  <tbody>

    <?php $num = 1; ?>
    @foreach ($insurance as $item)
      <tr>
        <td>{{ $num++ }}</td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->company_name }}</td>
        <td>{{ $item->emp_name }} </td>
        <td>{{ $item->analytics_name }} </td>
        <td>{{ $item->doctor_name }} </td>
        <td>{{ $item->price }} دينار </td>
        <td> @if($item->status == "ok") مقبولة @else غير مقبولة @endif</td>
        <td>{{ $item->created }} </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endif






</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
        $(document).on("click", ".query_insurance_number", function(event) {
          event.preventDefault()
          var insurance_number     = $("#insurance_number").val();
        $.ajax({
          url: "/hospital/query.insurance.number",
          data:{insurance_number:insurance_number },
          success:function (data) {
            $("#result_insurance_number").html(data);
          }
        });
      });


// Ø§Ø³ØªØ¯Ø¹Ø§Ø¡ Ø§Ù„Ø§Ù‚Ø³Ø§Ù… Ø§Ù„ÙØ±Ø¹ÙŠØ©
$(".select_category").change(function(){
  var id = $(this).val();
  $.ajax({
      url:"/hospital/ajax.get.medical.examination",
      method:"get",
      data:{id:id},
      success:function(data) {
        $(".medical_examination").html(data);
      }
  });
});   

$(".list-category .item").click(function(){
  var category = $(this).data("id");
    $(".links").hide(600);
    $(".examination_" + category).show(600);
});

</script>











<style>
.navbar {  width: 89%;  font-size: 13px; }
.navbar-light .navbar-brand { font-size: 15px; }
.navbar i { font-size: 18px; }
.navbar img { width: 40px; height: 40px; }
body { padding-right: 200px; padding-top: 15px; }
.menuRight { width: 200px; padding: 10px; }

ul {  padding-right: 0px; }
.menuRight ul li { padding: 8px;font-size: 13px; }
.menuRight ul li i { font-size: 17px; }
.menuRight img { width: 75px; }
.menuRight h4 { font-size: 19px; }

</style>
@endsection