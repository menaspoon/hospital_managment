@extends('master')
@section('content')

<div class="companies container-fuild">

<h3 class="text-center">{{ $title->name }}</h3>
<br><br>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">الشركة</th>
        <th scope="col">المريض</th>
        <th scope="col">القسم</th>
        <th scope="col">الكشف</th>
        <th scope="col">السعر</th>
        <th scope="col">الدكتور</th>
        <th scope="col">ميعاد الحجز</th>
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
            <td>{{ $item->price }} - دينار </td>
            <td> </td>
            <td>{{ $item->created }} </td>
          </tr>
        @endforeach
    </tbody>
  </table>



{{--

  <br><br>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">المريض</th>
        <th scope="col">القسم</th>
        <th scope="col">الكشف</th>
        <th scope="col">السعر</th>
        <th scope="col">الدكتور</th>
        <th scope="col">ميعاد الحجز</th>
        <th scope="col">تحكم</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($normal as $item)
        <tr>
            <td scope="row">{{ $item->id }}</td>
            <td>{{ $item->category_name }} </td>
            <td>{{ $item->medical_examination_name }} </td>
            <td>{{ $item->price }} - دينار </td>
            <td>{{ $item->doctor }} </td>
            <td>{{ $item->created }} </td>
          </tr>
        @endforeach
    </tbody>
  </table>

--}}






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