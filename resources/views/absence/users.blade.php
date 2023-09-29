
@extends('master')
@section('content')
<div>
  <div class="container">
<style>
  svg { display: none !important;}
  .form-check-input[type=checkbox]:checked:after { display: none }
</style>

    <div class="row">
      <div class="col-md-6">
          <h2>الحضور والغياب</h2>
      </div>

    </div>



{{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}
@if (Session::has("created"))
  <div class="alert alert-success texe-center text-center" role="alert">
    {{ Session::get("created") }}
  </div><br>
@endif

@if (Session::has("updated"))
  <div class="alert alert-success texe-center text-center" role="alert">
    {{ Session::get("updated") }}
  </div><br>
@endif

@if (Session::has("deleted"))
  <div class="alert alert-success texe-center text-center" role="alert">
    {{ Session::get("deleted") }}
  </div><br>
@endif
{{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}



    <div class="box-table">
      <table class="table border">
        <thead class="thead-dark">
          <tr class="parent">
            <th scope="col">#</th>
            <th scope="col"> الموظف  </th>
            <th scope="col"> لوحة التحكم </th>
          </tr>
        </thead>
        <tbody > 
          <?php $id = 1 ?>
          @foreach ($data as $item)
           <tr>
              <td>{{ $id++ }}</td>
              <td> {{ $item->name }}</td>
              <td>
                      <a data-id="{{ $item->id }}" class="btn-action btn-plus actions"> <i class="fas fa-plus"></i> </a>
                      <a data-id="{{ $item->id }}" class="btn-action btn-minus actions"> <i class="fas fa-minus"></i> </a>
                      <a data-id="{{ $item->id }}" class="btn-action btn-departure actions"><i class="fas fa-power-off"></i></a>
                      <a data-id="{{ $item->id }}" class="btn-action btn-time-overtime actions" data-toggle="modal" data-target="#btn-time-overtime"><i class="far fa-alarm-clock"></i></a>
                      <a data-id="{{ $item->id }}" class="btn-action btn-vacation actions"><i class="far fa-plane-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>

  </div>
</div>










<!-- الوقت الاضافي -->
<div class="modal fade" id="btn-time-overtime" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="https://hair-center.mix-store.net/stock.add.prodact" method="POST" class="modal-content" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel"> اضافة </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="hidden" name="_token" value="Rbl6MVssLQlfn3HYVV2yugNNzlkdJgD2SlLtLAAc">        
        <div class="form-outline">
            <input type="hidden" id="user_overtime" class="getID" />
            <input type="text"   id="overtime" id="getID" class="form-control form-control-lg" />
            <label class="form-label" id="name" for="formControlLg" style="margin-left: 0px;"> عدد الساعات </label>
        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 170.4px;"></div><div class="form-notch-trailing"></div></div></div>
        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
        <button type="button" class="btn btn-primary add-overtime">  حفــــظ </button>
      </div>
    </form>
  </div>
</div>
<!-- الوقت الاضافي -->







<style>
  input, select {
    text-align: left
  }
  .swal-button {
    background-color: #007bff;
    color: #fff;
    border: none;
    box-shadow: none;
    border-radius: 3px;
    font-weight: 600;
    font-size: 14px;
    padding: 7px 24px;
    margin: 0;
    cursor: pointer;
    outline: none
}
</style>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>




$(document).on("click", ".btn-plus", function() {
    var id = $(this).data("id");
    $.ajax({
        url: "/user.store.plus",
        data:{id:id},
        success:function (html) { 
          swal("عملية ناجحة", "تم عملية تحضير الموظف بنجاح :)", "success", {
            button:true,
            button:"ok",
          })
         }
      });
});

$(document).on("click", ".btn-minus", function() {
    var id = $(this).data("id");
    $.ajax({
        url: "/user.store.minus",
        data:{id:id},
        success:function (html) { 
          if(html.data == "success") {
            swal("عملية ناجحة", "تم اضافة الموظف  الي لائحة الغياب بنجاح :)", "success", {
              button:true, button:"ok",
            });
          } else {
            swal("عملية غير ناجحة", " تم حذف الموظف من لائحة الغياب:)", "success", {
              //button:true, button:"ok",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            });
          }

        }
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
