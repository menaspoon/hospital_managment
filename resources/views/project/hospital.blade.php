@extends('master')
@section('content')

<div class="companies container-fuild">

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


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    اضافة مستشفي جديدة
</button>
<br><br>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">المستشفي</th>
            <th scope="col">بيانات التواصل</th>
            <th scope="col">العنوان</th>
            <th scope="col">الاشتراك</th>
            <th scope="col">بداية - انتهاء</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($hospitals as $hot)
            <tr>
                <th scope="row">{{ $hot->id }}</th>
                <td>{{ $hot->name }}</td>
                <td> <a href="mailto:{{ $hot->email }}">{{ $hot->email }}</a> <br><a href="tel:{{ $hot->phone }}">{{ $hot->phone }}</a> </td>
                <td>{{ $hot->city }} - {{ $hot->neighborhood }} - {{ $hot->address }} </td>
                <td>@if ($hot->subscription == true) مشترك  @else غير مشترك @endif</td>
                <td>{{ $hot->start }} <br> {{ $hot->end }}</td>
                <td class="actions"> 
                  <a data-id="{{ $hot->id }}" data-table="hospital" class="delete"><i class="far fa-trash-alt"></i></a>
                  <a data-id="{{ $hot->id }}" class="edit_hospital" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>










  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <form action="{{ route("store.hospital") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> بيانات المستشفي  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-outline">
                <input type="text" required name="name" id="form12" class="form-control" />
                <label class="form-label" for="form12"> اسم المستشفي </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="email" required name="email" id="form12" class="form-control" />
                <label class="form-label" for="form12"> البريد الالكتروني </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="number" required name="discount_percentage" id="form12" class="form-control" />
                <label class="form-label" for="form12"> نسبة الخصم </label>
            </div>
            <br>
            
            <div class="form-outline">
                <input type="text" required name="phone" id="form12" class="form-control" />
                <label class="form-label" for="form12"> رقم الهاتف </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="text" required name="city" id="form12" class="form-control" />
                <label class="form-label" for="form12"> المدينة </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="text" required name="neighborhood" id="form12" class="form-control" />
                <label class="form-label" for="form12"> الحي </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="text" required name="address" id="form12" class="form-control" />
                <label class="form-label" for="form12"> العنوان </label>
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
  <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route("update.hospital") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">  تعديل البيانات  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <input type="hidden" name="id" id="id">
        <div class="modal-body">
            <div class="form-outline">
                <input type="date" required name="start" id="start" class="form-control" />
                <label class="form-label" for="form12"> تاريخ البدء </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="date" required name="end" id="end" class="form-control" />
                <label class="form-label" for="form12"> تاريخ الانتهاء </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="date" required name="notifications" id="notifications" class="form-control" />
                <label class="form-label" for="form12"> تاريخ اشعار الانتهاء </label>
            </div>
            <br>
            <div class="form-outline">
                <select name="subscription" id="form12" class="form-control" >
                  <option value="month">تجريبي</option>
                  <option value="yearly">سنوي</option>
                </select>
                <input type="hidden"  />
                <label class="form-label" for="form12"> نوع الاشتراك </label>
            </div>
            <br>
            <div class="form-outline">
              <select name="status" id="form12" class="form-control" >
                <option value="false">ايقاف</option>
                <option value="true">تشغيل</option>
              </select>
              <input type="hidden"  />
              <label class="form-label" for="form12">  الحالة </label>
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
        $(document).on("click", ".edit_hospital", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/hospital/ajax.get.hospital",
          data:{id:id },
          success:function (html) {
            $("#id").val(html.data.id);
            $("#start").val(html.data.start);
            $("#end").val(html.data.end);

            $("#EditModal .modal-body #notifications").val(html.data.notifications);
            $("#EditModal .modal-body .form-label").css("top", "-12px")
            $("#EditModal .modal-body .form-label").css("background", "#fff")
            $("#EditModal .modal-body .form-label").css("padding", "0px 10px")
            $("#EditModal .modal-body .form-label").css("z-index", "100")
          }
        });
      });

</script>
@endsection