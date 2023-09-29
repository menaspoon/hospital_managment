@extends('master')
@section('content')

<div class="companies container-fuild">

<br>
<h4 class="text-center">تقارير  القيمة</h4>
<br>

<form action="{{ route('reports.money') }}">
  <div class="row">

    <div class="col-md-6">
      <label for=""> الشركة </label>
      <select name="company" class="form-control">
        <option> اختار الشركة </option>
        @foreach ($companies as $item)
          <option value="{{ $item->id }}"> {{ $item->name }} </option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <label for=""> المبلغ</label>
      <input type="number" name="balance" class="form-control">
    </div>
    <div class="col-md-12">
      <br>
      <button style="width:100%" class="btn btn-primary"> بحث </button>
    </div>

  </div>
</form>


<br><br>
@if ($balance)
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">الشركة</th>
      <th scope="col">الموظف</th>
      <th scope="col">الهاتف</th>
      <th scope="col">البريد الالكتروني</th>
      <th scope="col">العنوان</th>
      <th scope="col"> بطاقة الهاوية </th>
      <th scope="col">  الرصيد </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($balance as $item)
      <tr>
          <td scope="row">{{ $item->id }}</td>
          <td>{{ $item->company_name }}</td>
          <td>{{ $item->name }} </td>
          <td>{{ $item->phone }} </td>
          <td>{{ $item->email }} </td>
          <td>{{ $item->address }} </td>
          <td>{{ $item->card_id }} </td>
          <td>{{ $item->balance }} دينار </td>
        </tr>
      @endforeach
  </tbody>
</table>
@endif




</div>




@endsection