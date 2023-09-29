@extends('master')
@section('content')

<div class="companies container-fuild">

<br>
<h4 class="text-center">تقارير الطـــــــوارئ الموظف بالحالات</h4>
<br>

<form action="{{ url('report.emergency.employees.status') }}">
  <div class="row">
    <div class="col-md-2">
      <label for="">بداية التاريخ</label>
      <input type="date" name="start" class="form-control">
    </div>
    <div class="col-md-2">
      <label for="">نهاية التاريخ</label>
      <input type="date" name="end" class="form-control">
    </div>
    <div class="col-md-2">
      <label for=""> الشركة </label>
      <select name="company" class="form-control select_campany">
        <option> اختار الشركة </option>
        @foreach ($companies as $item)
          <option value="{{ $item->id }}"> {{ $item->name }} </option>
        @endforeach
      </select>
    </div>
    <div class="col-md-2">
      <label for=""> الموظفين </label>
      <select name="employees" class="form-control employees" >

      </select>
    </div>
    <div class="col-md-2">
      <label for=""> الحالة </label>
      <select name="status" class="form-control">
        <option value="ok"> مقبولة </option>
        <option value="not"> غير مقبولة </option>
      </select>
    </div>
    <div class="col-md-12">
      <br>
      <button style="width:100%" class="btn btn-primary"> بحث </button>
    </div>

  </div>
</form>


<br><br>
@if ($insurance)
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">رقم الروشتة</th>
      <th scope="col">الشركة</th>
      <th scope="col">المريض</th>
      <th scope="col">الطـــــــوارئ</th>
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
        <td>{{ $item->emergency_name }} </td>
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


$(".select_campany").change(function(){
  var id = $(this).val();
  $.ajax({
      url:"/ajax.get.employees.campany",
      method:"get",
      data:{id:id},
      success:function(data) {
        $(".employees").html(data);
      }
  });
});   


</script>
@endsection