@extends('master')
@section('content')

<div class="companies container">
  <div class="row">
    <div class="col-md-6">
      <h2>الطـــــــوارئ</h2>
    </div>
    <div class="col-md-6">
      <button type="button" style="float: left" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          اضافة كشف جديدة
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
        <thead class="" style="background-color: #9c27b0;">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الكشف</th>
            <th scope="col">السعر</th>
            <th scope="col">الحالة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
            <?php $num = 1; ?>
            @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $num++ }}</th>
                <td> <a href="{{ $item->id }}">{{ $item->name }}</a>  </td>
                <td> {{ $item->price }} دينار  </td>
                <td class="actions"> 
                  <a data-id="{{ $item->id }}" data-table="emergency" class="delete"><i class="far fa-trash-alt"></i></a>
                  <a data-id="{{ $item->id }}" class="edit_emergency" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>






      



  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route("store.emergency") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">  اضافة قسم  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-outline">
                <input type="hidden" required name="category" value="{{ request()->route("category") }}" />
                <input type="text" required name="name" id="form12" class="form-control" />
                <label class="form-label" for="form12"> اسم الكشف </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="number" required name="price" id="form12" class="form-control" />
                <label class="form-label" for="form12"> السعر  </label>
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
        <form action="{{ route("update.emergency") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">  اضافة قسم  </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="form-outline">
                  <input type="hidden" required id="id" name="id"  />
                  <input type="text" required name="edit_name" id="name" class="form-control" />
                  <label class="form-label" for="form12"> اسم الكشف </label>
              </div>
              <br>
              <div class="form-outline">
                  <input type="number" required name="edit_price" id="price" class="form-control" />
                  <label class="form-label" for="form12"> السعر  </label>
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
  
</div>







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
        $(document).on("click", ".edit_emergency", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/ajax.get.emergency",
          data:{id:id },
          success:function (html) {
            $("#EditModal .modal-body #id").val(html.data.id);
            $("#EditModal .modal-body #name").val(html.data.name);
            $("#EditModal .modal-body #price").val(html.data.price);
            
            $("#EditModal .modal-body .form-label").css("top", "-12px")
            $("#EditModal .modal-body .form-label").css("background", "#fff")
            $("#EditModal .modal-body .form-label").css("padding", "0px 10px")
            $("#EditModal .modal-body .form-label").css("z-index", "100")
          }
        });
      });

</script>

@endsection