@extends('master')
@section('content')

<div class="companies container-fuild">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    اضافة مورد جديدة
</button>
<br><br>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الشركة</th>
            <th scope="col">بيانات التواصل</th>
            <th scope="col">العنوان</th>
            <th scope="col">المبلغ</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($supplier as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td> <a href="mailto:{{ $item->email }}">{{ $item->email }}</a> <br> <a href="mailto:{{ $item->phone }}">{{ $item->phone }}</a> </td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->balance }}</td>
                <td>
                  <a data-id="{{ $item->id }}" data-table="supplier" class="delete"><i class="far fa-trash-alt"></i></a>
                  <a data-id="{{ $item->id }}" class="edit_supplier" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>










  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route("store.supplier") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> بيانات المورد  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-outline">
                    <input type="text" required name="name" id="form12" class="form-control" />
                    <label class="form-label" for="form12"> اسم المورد </label>
                </div>
                <br>
              </div>
              <div class="col-md-12">
                <div class="form-outline">
                    <input type="email" required name="email" id="form12" class="form-control" />
                    <label class="form-label" for="form12"> البريد الالكتروني </label>
                </div>
                <br>
              </div>
              <div class="col-md-12">
                  <div class="form-outline">
                    <input type="text" required name="phone" id="form12" class="form-control" />
                    <label class="form-label" for="form12"> رقم الهاتف </label>
                </div>
                <br>
              </div>
              <div class="col-md-12">
                <div class="form-outline">
                    <input type="text" required name="address" id="form12" class="form-control" />
                    <label class="form-label" for="form12"> العنوان </label>
                </div>
                <br>
              </div>
              <div class="col-md-12">
                <div class="form-outline">
                    <input type="number" required name="discount_percentage" id="form12" class="form-control" />
                    <label class="form-label" for="form12">  نسبة الخصم </label>
                </div>
                <br>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
          <button type="summit" class="btn btn-primary"> حفظ البيانات </button>
        </div>
      </form>
    </div>
  </div>
</div>



  
  <!-- Modal -->
  <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route("update.supplier") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">  تحدبث البيانات  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-outline">
              <input type="hidden" required name="id" id="id" class="form-control" />
              <input type="text" required name="edit_name" id="name" class="form-control" />
              <label class="form-label" for="form12"> اسم المورد </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="number" required name="edit_phone" id="phone" class="form-control" />
                <label class="form-label" for="form12">  رقم الهاتف </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="email" required name="edit_email" id="email" class="form-control" />
                <label class="form-label" for="form12"> البريد الالكتروني </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="text" required name="edit_address" id="address" class="form-control" />
                <label class="form-label" for="form12"> العنوان </label>
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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
        $(document).on("click", ".edit_supplier", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/hospital/ajax.get.supplier",
          data:{id:id },
          success:function (html) {
            $("#EditModal .modal-body #id").val(html.data.id);
            $("#EditModal .modal-body #name").val(html.data.name);
            $("#EditModal .modal-body #email").val(html.data.email);
            $("#EditModal .modal-body #phone").val(html.data.phone);
            $("#EditModal .modal-body #address").val(html.data.address);
            $("#EditModal .modal-body #discount_percentage").val(html.data.discount_percentage);
          }
        });
      });

</script>

@endsection