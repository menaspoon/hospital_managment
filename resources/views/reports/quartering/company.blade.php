@extends('master')
@section('content')

<div class="companies container-fuild">


<h4 class="text-center">تقارير   الايــــواء  بواسطة شركات التامين</h4>


<form action="{{ url('report.quartering.company') }}">
  <div class="row">
    <div class="col-md-4">
      <label for="">بداية التاريخ</label>
      <input type="date" name="start" class="form-control">
    </div>
    <div class="col-md-4">
      <label for="">نهاية التاريخ</label>
      <input type="date" name="end" class="form-control">
    </div>
    <div class="col-md-4">
      <label for=""> الشركة </label>
      <select name="company" class="form-control">
        <option> اختار الشركة </option>
        @foreach ($companies as $item)
          <option value="{{ $item->id }}"> {{ $item->name }} </option>
        @endforeach
      </select>
    </div>
    <div class="col-md-12">
      <br>
      <button style="width:100%" class="btn btn-primary"> بحث </button>
    </div>

  </div>
</form>


<br>
@if ($insurance)
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">رقم الروشتة</th>
      <th scope="col">الشركة</th>
      <th scope="col">المريض</th>
      <th scope="col">الايــــواء</th>
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
        <td>{{ $item->quartering_name }} </td>
        <td>{{ $item->doctor_name }} </td>
        <td>{{ $item->price }} دينار </td>
        <td> @if($item->status == "ok") مقبولة @else غير مقبولة @endif</td>
        <td>{{ $item->created }} </td>
      </tr>
    @endforeach
    <div class="total_count_rows_of_report">
      <strong> عدد النتائج : </strong> 
      <span>{{ $num - 1 }}</span>
    </div>
  </tbody>
</table>
@endif




</div>




@endsection