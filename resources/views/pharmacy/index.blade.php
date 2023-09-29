@extends('master')
@section('content')

<div class="companies container">
  <div class="row">
    <div class="col-md-6">
      <h2> الصيدلية </h2>
    </div>
    <div class="col-md-6">
      <button type="button" style="float: left" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          اضافة  منتج
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
<br>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">العدد</th>
      <th scope="col">سعر الشراء</th>
      <th scope="col">سعر البيع</th>
      <th scope="col">انتهاء الصلاحية</th>
      <th scope="col"> طريقة الاستخدام</th>
      <th scope="col">تحكم</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($data as $item)
      <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->name }}</td>
          <td>{{ $item->count }}</td>
          <td>{{ $item->selling_price }}</td>
          <td>{{ $item->buy_price }}</td>
          <td>{{ $item->expiration_date }}</td>
          <td>{{ $item->how_to_use }}</td>
          <td>
            <a data-id="{{ $item->id }}" data-table="pharmacy" class="users actions"><i class="far fa-trash-alt"></i></a>
            <a data-id="{{ $item->id }}" class="edit_pharmacy actions" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>





  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route("store.prodact.pharmacy") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
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
                <label class="form-label" for="form12">  العدد </label>
                <input type="number" required name="count" id="form12" class="form-control" />
            </div>
            <br>
            <div class="">
                <label class="form-label" for="form12"> سعر الشراء </label>
                <input type="number" required name="selling_price" id="form12" class="form-control" />
            </div>
            <br>
            <div class="">
                <label class="form-label" for="form12"> سعر البيع </label>
                <input type="number" required name="buy_price" id="form12" class="form-control" />
            </div>
            <br>
            <div class="">
                <label class="form-label" for="form12"> انتهاء الصلاحية </label>
                <input type="date" required name="expiration_date" id="form12" class="form-control" />
            </div>
            <br>            
            <div class="">
                <label class="form-label" for="form12">طريقة الاستخدام</label>
                <textarea name="how_to_use" id="" cols="40" rows="4" class="form-control"></textarea>
            </div>
            <br>
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
      <form action="{{ route("update.prodact.pharmacy") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> تحديث البيانات   </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="">
              <label class="form-label" for="form12"> الاســــــم  </label>
              <input type="text" required name="id" id="id" class="form-control" />
              <input type="text" required name="edit_name" id="name" class="form-control" />
          </div>
          <br>
          <div class="">
              <label class="form-label" for="form12"> سعر الشراء </label>
              <input type="number" required name="edit_selling_price" id="selling_price" class="form-control" />
          </div>
          <br>
          <div class="">
              <label class="form-label" for="form12"> سعر البيع </label>
              <input type="number" required name="edit_buy_price" id="buy_price" class="form-control" />
          </div>
          <br>
          <div class="">
              <label class="form-label" for="form12"> انتهاء الصلاحية </label>
              <input type="date" required name="edit_expiration_date" id="expiration_date" class="form-control" />
          </div>
          <br>            
          <div class="">
              <label class="form-label" for="form12">طريقة الاستخدام</label>
              <textarea name="edit_how_to_use" id="how_to_use" cols="40" rows="4" class="form-control"></textarea>
          </div>
          <br>
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
        $(document).on("click", ".edit_pharmacy", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/hospital/ajax.get.pharmacy",
          data:{id:id },
          success:function (html) {
            $("#EditModal .modal-body #id").val(html.data.id);
            $("#EditModal .modal-body #name").val(html.data.name);
            $("#EditModal .modal-body #count").val(html.data.count);
            $("#EditModal .modal-body #selling_price").val(html.data.selling_price);
            $("#EditModal .modal-body #buy_price").val(html.data.buy_price);
            $("#EditModal .modal-body #expiration_date").val(html.data.expiration_date);
            $("#EditModal .modal-body #how_to_use").val(html.data.how_to_use);
          }
        });
      });

</script>
@endsection