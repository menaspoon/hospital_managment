@extends('master')
@section('content')

<div class="companies container-fuild">


<div class="dashbord">
  <div class="counts">
    <div class="row">
      <div class="col-md-2">
        <div class="box">
          <span>عدد الاطباء</span>
          <strong> {{ $doctor }} <b>طبيب</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box">
          <span> عدد الشركات </span>
          <strong> {{ $companies }} <b>شركة</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box">
          <span> عدد الموظفين </span>
          <strong> {{ $employees }} <b>موظف</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box">
          <span> عدد القسم </span>
          <strong> {{ $category }} <b>قسم</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box">
          <span> الكشف الطبي  </span>
          <strong> {{ $medical_examination }} <b> كشف </b> </strong>
        </div>
      </div>

    </div>
  </div>
</div>


@endsection