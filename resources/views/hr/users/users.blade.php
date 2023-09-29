@extends('master')
@section('content')

<div class="companies container">
  <div class="row">
    <div class="col-md-6">
      <h2>لوحة المستخدمين</h2>
    </div>
    <div class="col-md-6">
      <button type="button" style="float: left" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          اضافة حساب  جديدة
      </button>
    </div>
  </div>
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
{{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}
<br><br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col"> التواصل</th>
      <th scope="col"> الشركة </th>
      <th scope="col">تحكم</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($data as $item)
      <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->name }}</td>
          <td> <a href="mailto:{{ $item->email }}">{{ $item->email }}</a> <br> <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a> </td>
          <td>
            @foreach ($companies as $hos)
              @if ($hos->id == $item->company)
               {{ $hos->name}}
              @endif
            @endforeach
          </td>
          <td>
            <a data-id="{{ $item->id }}" class="actions" id="delete-acount" ><i class="far fa-trash-alt"></i></a>
            <a data-id="{{ $item->id }}" class="btn-action btn-plus actions"> <i class="fas fa-plus"></i> </a>
            <a data-id="{{ $item->id }}" class="btn-action btn-mins actions"> <i class="fas fa-minus"></i> </a>
            <a data-id="{{ $item->id }}" class="btn-action btn-departure actions"><i class="fas fa-power-off"></i></a>
            <a data-id="{{ $item->id }}" class="btn-action btn-time-overtime actions" data-bs-toggle="modal" data-bs-target="#BtnTimeOvertime"><i class="far fa-alarm-clock"></i></a>
            <a data-id="{{ $item->id }}" class="btn-action btn-vacation actions"><i class="far fa-plane-alt"></i></a>
<!--
            <a href="chat/{{ Auth::id() }}/{{ $item->id }}" class="actions"> <i class="fal fa-comments-alt"></i> </a>
-->
          </td>
        </tr>
      @endforeach
  </tbody>
</table>





  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route("store.acount") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name="acount" value="{{ request()->route('acounts')}}" />
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> بيانات الحساب </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="">
                <label class="form-label" for="form12"> الاســــــم  </label>
                <input type="text" required name="name" id="form12" class="form-control" />
            </div>
            <br>
            <div class="">
                <label class="form-label" for="form12">  البريد الالكتروني </label>
                <input type="email" required name="email" id="form12" class="form-control" />
            </div>
            <br>
            <div class="">
                <label class="form-label" for="form12">  رقم الهاتف </label>
                <input type="number" required name="phone" id="form12" class="form-control" />
            </div>
            <br>
            <div class="">
                <label class="form-label" for="form12">  كلمة المرور </label>
                <input type="password" required name="password" id="form12" class="form-control" />
            </div>
            <br>
            <div class="">
              <label class="form-label" for="form12"> الشركة التابع لها </label>
              <select name="" id="" class="form-control">
                @foreach ($companies as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
            </div>
            <br>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
          <button type="summit" class="btn btn-primary"> حفظ البيانات </button>
        </div>
      </form>
    </div>
  </div>

  
  <!-- Modal -->
  <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route("store.category") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">  اضافة قسم  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-outline">
                <input type="text" required name="name" id="form12" class="form-control" />
                <label class="form-label" for="form12"> اسم القسم </label>
            </div>
            <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
          <button type="summit" class="btn btn-primary"> حفظ البيانات </button>
        </div>
      </form>
    </div>
  </div>






<!-- الوقت الاضافي -->
<div class="modal fade" id="BtnTimeOvertime" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="POST" class="modal-content" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel"> اضافة </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        @csrf
        <div class="form-outline">
            <input type="hidden" id="user_overtime" class="getID" />
            <input type="text"   id="overtime" id="getID" class="form-control form-control-lg" />
            <label class="form-label" id="name" for="formControlLg" style="margin-left: 0px;"> عدد الساعات </label>
        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 170.4px;"></div><div class="form-notch-trailing"></div></div></div>
        @error('name')
        <div class="text-danger"> {{ $message }} <div>
        @enderror



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="button" class="btn btn-primary add-overtime">  حفــــظ </button>
      </div>
    </form>
  </div>
</div>
<!-- الوقت الاضافي -->


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script>
        $(document).on("click", ".edit_category", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/hospital/ajax.get.category",
          data:{id:id },
          success:function (html) {
            $("#EditModal .modal-body #id").val(html.data.id);
            $("#EditModal .modal-body #name").val(html.data.name);
            
            $("#EditModal .modal-body .form-label").css("top", "-12px")
            $("#EditModal .modal-body .form-label").css("background", "#fff")
            $("#EditModal .modal-body .form-label").css("padding", "0px 10px")
            $("#EditModal .modal-body .form-label").css("z-index", "100")
          }
        });
      });


$(document).on("click", "#delete-acount", function() {
    var id = $(this).data("id");
    $.ajax({
        url: "/delete.user.acount/" . id,
        data:{id:id},
        success:function (html) { alert("تم p الموظف ") }
      });
});
      
$(document).on("click", ".btn-plus", function() {
    var id = $(this).data("id");
    $.ajax({
        url: "/user.store.plus",
        data:{id:id},
        success:function (html) { alert("تم تحضير الموظف ") }
      });
});

$(document).on("click", ".btn-mins", function() {
    var id = $(this).data("id");
    $.ajax({
        url: "/user.store.minus",
        data:{id:id},
        success:function (html) { alert("تم تغيب الموظف ") }
      });
});

$(document).on("click", ".btn-departure", function() {
    var id = $(this).data("id");
    $.ajax({
        url: "/user.store.departure",
        data:{id:id},
        success:function (html) { alert("تم اقلاع الموظف ") }
      });
});

$(document).on("click", ".add-overtime", function() {

    var user_overtime = $("#user_overtime").val();
    var overtime = $("#overtime").val();

    $.ajax({
        url: "/user.store.overtime",
        data:{user_overtime:user_overtime, overtime:overtime},
        success:function (html) { alert("تم الوقت الاضافي الموظف ") }
      });
});

$(document).on("click", ".btn-vacation", function() {
    var id = $(this).data("id");
    $.ajax({
        url: "/user.store.vacation",
        data:{id:id},
        success:function (html) { alert("تم اضافة الاجازة الموظف ") }
      });
});




$(document).on("click", ".btn-time-overtime", function() {
    var id = $(this).data("id");
    $(".getID").val(id);
});
</script>





@endsection