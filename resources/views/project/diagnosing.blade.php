@extends('master')
@section('content')

<div class="companies container-fuild">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    اضافة خزينة جديدة
</button>
<br>
{{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}
<br>



@if (Session::has("created"))
  <div class="alert alert-success texe-center text-center" role="alert">
    {{ Session::get("created") }}
  </div>
@endif
@if (Session::has("updated"))
  <div class="alert alert-success texe-center text-center" role="alert">
    {{ Session::get("updated") }}
  </div>
@endif



<style>
  
.diagnosing .item-content {
    background: white;
    padding: 20px;
    margin-bottom: 30px;
}
</style>

<div class="container diagnosing">

  @foreach ($data as $item)
    <div class="item-content">
      <div class="content">
        <div>
          <a href=""> {{ $item->doctor_name }}</a> <br>
          <span>{{ $item->created }}</span>
        </div>
        <p>{{ $item->text  }}</p>
      </div> 
      <br>
      @foreach ($files as $file)
        @if ($file->diagnosing_details == $item->id)
        <a href="" class="btn btn-primary"> تنزيل الملف {{ $file->type  }}</a>
        @endif
      @endforeach
    </div>
  @endforeach



</div>



@endsection