@extends('master')
@section('content')

<div class="companies container-fuild">

<h4 class="text-center"> تقارير العناية المركزة بواسطة الموظف  </h4>
<br>

<form action="{{ url('report.stock') }}">
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


<br>
@if ($data)
<table class="table">
    <thead class="" style="background-color: #8bc34a;">
      <tr>
        <th scope="col">#</th>
        <th scope="col">المنتج</th>
        <th scope="col">العدد في المخزن</th>
        <th scope="col">العدد في المستشفي</th>
        <th scope="col">تحكم</th>
      </tr>
    </thead>
    <tbody>
      <?php $num = 1; ?>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td> {{ $item->name }}  </td>
            <td> {{ $item->count_stock }} </td>
            <td> {{ $item->count_hospital }} </td>
            <td class="actions"> 
              <a data-id="{{ $item->id }}" data-table="surgery" class="delete"><i class="far fa-trash-alt"></i></a>
              <a data-id="{{ $item->id }}" data-bs-toggle="modal" class="edit_surgery" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
            </td>
          </tr>
        @endforeach
    </tbody>
    <div class="total_count_rows_of_report">
        <strong> عدد النتائج : </strong> 
        <span>{{ $num - 1 }}</span>
    </div>
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