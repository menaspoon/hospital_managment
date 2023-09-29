
@extends('master')
@section('content')
<br><br><br>
<div>
  <div class="container">
<style>
  svg { display: none !important;}
  .form-check-input[type=checkbox]:checked:after { display: none }
</style>

    <div class="row">
      <div class="col-md-6">
          <h2>الموظفين</h2>
      </div>

    </div>

    <br>


{{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}
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

@if (Session::has("deleted"))
  <div class="alert alert-success texe-center text-center" role="alert">
    {{ Session::get("deleted") }}
  </div>
@endif
{{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}
<br>


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
</style>




  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).on("click", ".edit-user", function() {
    var id = $(this).data("id");
    var token  = $("input[name='_token']").val();

    $.ajax({
        url: "/get.user.acount",
        data:{token:token, id:id },
        success:function (html) {
          $("#user_id").val(html.data.id);
          $("#edit_name").val(html.data.name);
          $("#edit_email").val(html.data.email);
          $("#edit_password").val(html.data.text_password);
          $("#edit_branch").val(html.data.branch);
          $("#edit_branch").html(html.data.branch_name);

          if(html.permission.stock == 1) {
            $("#edit_stock").val(html.permission.stock);
            $('.edit_stock').prop('checked', true)
          }
          if(html.permission.products == 1) {
            $("#edit_products").val(html.permission.products);
            $('.edit_products').prop('checked', true)
          }
          if(html.permission.settings == 1) {
            $("#edit_settings").val(html.permission.settings);
            $('.edit_settings').prop('checked', true)
          }
          if(html.permission.potential_clients == 1) {
            $("#edit_potential_clients").val(html.permission.potential_clients);
            $('.edit_potential_clients').prop('checked', true)
          }
          if(html.permission.current_customers == 1) {
            $("#edit_current_customers").val(html.permission.current_customers);
            $('.edit_current_customers').prop('checked', true)
          }
          if(html.permission.categories == 1) {
            $("#edit_categories").val(html.permission.categories);
            $('.edit_categories').prop('checked', true)
          }
          if(html.permission.products_migration == 1) {
            $("#edit_products_migration").val(html.permission.products_migration);
            $('.edit_products_migration').prop('checked', true)
          }
          if(html.permission.absence == 1) {
            $("#edit_absence").val(html.permission.absence);
            $('.edit_absence').prop('checked', true)
          }
          if(html.permission.hr == 1) {
            $("#edit_hr").val(html.permission.hr);
            $('.edit_hr').prop('checked', true)
          }
          if(html.permission.booking == 1) {
            $("#edit_booking").val(html.permission.booking);
            $('.edit_booking').prop('checked', true)
          }
          if(html.permission.orders == 1) {
            $("#edit_orders").val(html.permission.orders);
            $('.edit_orders').prop('checked', true)
          }
          if(html.permission.status_clint == 1) {
            $("#edit_status_clint").val(html.permission.status_clint);
            $('.edit_status_clint').prop('checked', true)
          }
          if(html.permission.contact == 1) {
            $("#edit_contact").val(html.permission.contact);
            $('.edit_contact').prop('checked', true)
          }
          if(html.permission.waste_management == 1) {
            $("#edit_waste_management").val(html.permission.waste_management);
            $('.edit_waste_management').prop('checked', true)
          }
          if(html.permission.branch == 1) {
            $("#edit_waste_branch").val(html.permission.branch);
            $('.edit_waste_branch').prop('checked', true)
          }
          if(html.permission.tasks == 1) {
            $("#edit_tasks").val(html.permission.tasks);
            $('.edit_tasks').prop('checked', true)
          }
          if(html.permission.service == 1) {
            $("#edit_service").val(html.permission.service);
            $('.edit_service').prop('checked', true)
          }
          if(html.permission.operating_administration == 1) {
            $("#edit_operating_administration").val(html.permission.operating_administration);
            $('.edit_operating_administration').prop('checked', true)
          }

        }
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
        url: "/user.store.mins",
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
