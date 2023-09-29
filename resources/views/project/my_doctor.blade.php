@extends('master')
@section('content')

<div class="companies container-fuild">

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

<h2>كشف التامين</h2>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الشركة</th>
            <th scope="col">المريض</th>
            <th scope="col">القسم</th>
            <th scope="col">الكشف</th>
            <th scope="col">فصيلة الدم</th>
            <th scope="col">تاريخ الميلاد</th>
            <th scope="col">توقيت الحجز</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($insurance as $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->company_name }}</td>
                <td>{{ $item->emp_name }} </td>
                <td>{{ $item->category_name }} </td>
                <td>{{ $item->medical_examination_name }} </td>
                <td>{{ $item->blood_type }}  </td>
                <td>{{ $item->date_of_birth }}  </td>
                <td>{{ $item->createdd }} </td>
                <td>
                  <a href="">كشف</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>





      <br><br>
      <br><br>
      
      <h2>كشف المرضـــــــــي</h2>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">المريض</th>
            <th scope="col">القسم</th>
            <th scope="col">الكشف</th>
            <th scope="col">توقيت الحجز</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($normal as $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->username }} </td>
                <td>{{ $item->category_name }} </td>
                <td>{{ $item->medical_examination_name }} </td>
                <td>{{ $item->createdd }} </td>
                <td>
                  <a href="">كشف</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>




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
@endsection