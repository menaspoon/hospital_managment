@extends('master')
@section('content')

<div class="companies container-fuild">

<br>
<h4 class="text-center"> تقارير الاشعة بواسطة الدكتور  </h4>
<br>

<form action="{{ url('report.ray.doctor') }}">
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
      <label for=""> الدكتور </label>
      <select name="doctor" class="form-control employees" >
        <option value=""></option>
        @foreach ($doctors as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
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
      <th scope="col">التحليل</th>
      <th scope="col">الدكتور</th>
      <th scope="col">السعر</th>
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
        <td>{{ $item->ray_name }} </td>
        <td>{{ $item->doctor_name }} </td>
        <td>{{ $item->price }} دينار </td>
        <td>{{ $item->created }} </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endif




</div>


@endsection