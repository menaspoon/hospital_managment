@extends('master')
@section('content')

<h3 class="text-center">الاعـــــــدادات </h3><br><br>
<div class="container col-md-4">
  {{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}

@if (Session::has("updated"))
  <br>
  <div class="alert alert-primary texe-center text-center" role="alert">
    {{ Session::get("updated") }}
  </div>
  <br><br>
@endif
{{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}

  <form action="{{ route('update.settings') }}" method="POST">
    @csrf
    <label for=""> خصم الخدمة  </label>
    <input type="number" name="service_cost" class="form-control" value="{{ $settings->service_cost }}">
    <br>
    <label for="">نسبة الخصم</label>
    <input type="number" name="discount_percentage" class="form-control" value="{{ $settings->discount_percentage }}">
    <br>
    <label for="">نسبة الضرايب</label>
    <input type="number" name="taxes" class="form-control" value="{{ $settings->taxes }}">
    <br>
    <label for=""> اشعار قيمة التامين</label>
    <input type="number" name="notification_balance" class="form-control" value="{{ $settings->notification_balance }}">
    <br>
    <label for=""> تلقي المدفوعات </label>
    <div class="form-check form-check-inline">
      @if ($settings->receive_payments == "booking")
      <input class="form-check-input" type="radio" name="receive_payments" id="inlineRadio1" value="booking" checked/>
      @else
      <input class="form-check-input" type="radio" name="receive_payments" id="inlineRadio1" value="booking"/>
      @endif
      <label class="form-check-label" for="inlineRadio1">عند الحجز</label>
    </div>
    <div class="form-check form-check-inline">
      @if ($settings->receive_payments == "scaning")
      <input class="form-check-input" type="radio" name="receive_payments" id="inlineRadio1" value="scaning" checked/>
      @else
      <input class="form-check-input" type="radio" name="receive_payments" id="inlineRadio1" value="scaning"/>
      @endif
      <label class="form-check-label" for="inlineRadio2">بعد تمام الفحص</label>
    </div>
    <br><br>
    <button class="btn btn-primary" style="width:100%" type="submit"> تحديث الاعدادات </button>
  </form>
</div>




<style>
  .form-check-input[type=radio]:checked:after {
    border-radius: 50%;
    width: 13px;
    height: 13px;
    border-color: #1266f1;
    background-color: #1266f1;
    -webkit-transition: border-color;
    transition: border-color;
    -webkit-transform: translate(50%,-50%);
    transform: translate(50%,-50%);
    position: absolute;
    right: -13%;
    top: 46%;
}

label {
    display: inline-block;
    margin-left: 30px;
}

</style>

@endsection