
@extends('master')
@section('content')

<div class="companies container">

<br><br><br>
<h4 class="text-center"> فلتر الحضور والغياب  </h4>
<br>

<form action="{{ route('absence.fillter') }}">
  <div class="row">
    <div class="col-md-3">
      <label for="">بداية التاريخ</label>
      <input type="date" name="start" class="form-control">
    </div>
    <div class="col-md-3">
      <label for="">نهاية التاريخ</label>
      <input type="date" name="end" class="form-control">
    </div>
    <div class="col-md-3">
      <label for=""> الحالة </label>
      <select name="status" class="form-control">
        <option value="plus"> حضور </option>
        <option value="minus"> غياب </option>
        <option value="vacation"> اجازة </option>
      </select>
    </div>
    <div class="col-md-12">
      <br>
      <button style="width:100%" class="btn btn-primary"> بحث </button>
    </div>

  </div>
</form>


<br><br>
@if ($data)
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">الموظف</th>
      <th scope="col">التاريخ</th>
      <th scope="col">الحالة</th>
      <th scope="col">التحضير</th>
      <th scope="col">الانصراف</th>
      <th scope="col">الوقت الاضافي</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
      <tr>
          <td scope="row">{{ $item->id }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->date }} </td>
          <td>
              @if($item->status == 'plus')
                  حضور
              @elseif($item->status == 'vacation')
                اجازة
              @else
                  غياب
              @endif
            </td>
          <td>{{ $item->attendance_time }}</td>
          <td>{{ $item->time_departure }}</td>
          <td>{{ $item->overtime }}</td>

        </tr>
      @endforeach
  </tbody>
</table>
@endif




</div>


<br><br><br>

@endsection
