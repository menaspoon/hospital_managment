@extends('master')
@section('content')

<div class="companies container-fuild">

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
{{------------------------------  رسالةانشاء وتحديث البيانات  -----------------------------}}



<div class="row">
  <div class="col-md-6">
    <h3>اجــــازاتي</h3>
  </div>
  <div class="col-md-6">
    <button type="button" class="btn btn-primary" style="float:left" data-bs-toggle="modal" data-bs-target="#exampleModal">
        اضافة 
    </button>
  </div>
</div>
<br>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">بدء الاجازة</th>
            <th scope="col">نهاية الاجازة</th>
            <th scope="col">سبب الاجازة</th>
            <th scope="col">ملاحظات</th>
            <th scope="col">ملاحظات المدير</th>
            <th scope="col">الحالة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $hot)
            <tr>
                <th scope="row">{{ $hot->id }}</th>
                <td>{{ $hot->start }}</td>
                <td>{{ $hot->end }}</td>
                <td>{{ $hot->reason }}</td>
                <td>{{ $hot->note }}</td>
                <td>{{ $hot->note_admin }}</td>
                <td>
                  @if ($hot->status == "wating")
                      <span class="status-yallow">قيد المراجعة</span>
                  @endif
                  @if ($hot->status == "done")
                      <span class="status-green"> تم الموافقة </span>
                  @endif
                  @if ($hot->status == "suspension")
                      <span class="status-blue"> معلقة </span>
                  @endif
                  @if ($hot->status == "rejected")
                      <span class="status-red"> مرفوضة </span>
                  @endif
                </td>
                <td class="actions"> 
                  <a data-id="{{ $hot->id }}" data-table="vacation" class="delete"><i class="far fa-trash-alt"></i></a>
                  <a data-id="{{ $hot->id }}" class="edit_vacation" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>










  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <form action="{{ route("store.vacation") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> طلب اجازة </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-outline">
                <input type="date" required name="start" id="form12" class="form-control" />
                <label class="form-label" for="form12"> بدء الاجازة </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="date" required name="end" id="form12" class="form-control" />
                <label class="form-label" for="form12"> نهاية الاجازة </label>
            </div>
            <br>
            
            <div class="form-outline">
                <textarea required name="reason" class="form-control" cols="3" rows="3"></textarea>
                <label class="form-label" for="form12"> السبب </label>
            </div>
            <br>
            <div class="form-outline">
                <textarea required name="note" class="form-control" cols="3" rows="3"></textarea>
                <label class="form-label" for="form12"> ملاحظات </label>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
          <button type="summit" class="btn btn-primary"> حفظ البيانات </button>
        </div>
      </form>
    </div>
  </div>






  <!-- Modal -->
  <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <form action="{{ route("update.vacation") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" id="id" name="id">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> تعديل الطلب</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-outline">
                <input type="date" required name="edit_start" id="start" class="form-control" />
                <label class="form-label" for="form12"> بدء الاجازة </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="date" required name="edit_end" id="end" class="form-control" />
                <label class="form-label" for="form12"> نهاية الاجازة </label>
            </div>
            <br>
            
            <div class="form-outline">
                <textarea required name="edit_reason" id="reason" class="form-control" cols="3" rows="3"></textarea>
                <label class="form-label" for="form12"> السبب </label>
            </div>
            <br>
            <div class="form-outline">
                <textarea required name="edit_note" id="note" class="form-control" cols="3" rows="3"></textarea>
                <label class="form-label" for="form12"> ملاحظات </label>
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
        $(document).on("click", ".edit_vacation", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/ajax.get.vacation",
          data:{id:id },
          success:function (html) {
            $("#id").val(html.data.id);
            $("#start").val(html.data.start);
            $("#end").val(html.data.end);
            $("#reason").val(html.data.reason);
            $("#note").val(html.data.note);
            $("#status").val(html.data.status);
            $("#note_admin").val(html.data.note_admin);
            $("#EditModal .modal-body .form-label").css("top", "-12px")
            $("#EditModal .modal-body .form-label").css("background", "#fff")
            $("#EditModal .modal-body .form-label").css("padding", "0px 10px")
            $("#EditModal .modal-body .form-label").css("z-index", "100")
          }
        });
      });

</script>
@endsection