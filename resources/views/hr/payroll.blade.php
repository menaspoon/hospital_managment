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
    <h3>الرواتب</h3>
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
            <th scope="col">الموظف</th>
            <th scope="col">البنك</th>
            <th scope="col">الراتب</th>
            <th scope="col">الشهر</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $hot)
            <tr>
                <th>{{ $hot->id }}</th>
                <td>{{ $hot->username }}</td>
                <td>{{ $hot->bank_name }}</td>
                <td>{{ $hot->wage }} دينار</td>
                <td>{{ $hot->month }}</td>
                <td class="actions"> 
                  <a data-id="{{ $hot->id }}" data-table="payroll" class="delete"><i class="far fa-trash-alt"></i></a>
                  <a data-id="{{ $hot->id }}" class="edit_payroll" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>










  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <form action="{{ url("store.payroll") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> الراتب </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="form-outline" >
                <select required name="user" id="form12" class="form-control">
                  <option value=""></option>
                  <optgroup label="الدكاترة">
                    @foreach ($doctor as $item)
                      <option value="{{ $item->id  }}">{{ $item->name  }}</option>
                    @endforeach
                  </optgroup>
                  <optgroup label="الممرضين">
                    @foreach ($nurse as $item)
                      <option value="{{ $item->id  }}">{{ $item->name  }}</option>
                    @endforeach
                  </optgroup>
                </select>
                <input type="hidden"  />
                <label class="form-label" for="form12"> الموظف </label>
            </div>
            <br>

            <div class="form-outline">
                <input type="number" required name="wage" id="form12" class="form-control" />
                <label class="form-label" for="form12"> الاجر </label>
            </div>
            <br>
            
            <div class="form-outline">
                <input type="month" required name="month" id="form12" class="form-control" />
                <label class="form-label" for="form12"> الشهر </label>
            </div>
            <br>
            <div class="form-outline">
                <select required name="bank" id="form12" class="form-control">
                  <option value=""></option>
                  @foreach ($banks as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
                <input type="hidden" />
                <label class="form-label" for="form12"> الخزينة </label>
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

          
          <div class="form-outline" >
            <select required name="user" id="form12" class="form-control">
              <option value="" id="edit_user"></option>
              <optgroup label="الدكاترة">
                @foreach ($doctor as $item)
                  <option value="{{ $item->id  }}">{{ $item->name  }}</option>
                @endforeach
              </optgroup>
              <optgroup label="الممرضين">
                @foreach ($nurse as $item)
                  <option value="{{ $item->id  }}">{{ $item->name  }}</option>
                @endforeach
              </optgroup>
            </select>
            <input type="hidden"  />
            <label class="form-label" for="form12"> الموظف </label>
        </div>
        <br>

        <div class="form-outline">
            <input type="number" required name="edit_wage" id="edit_wage" class="form-control" />
            <label class="form-label" for="form12"> الاجر </label>
        </div>
        <br>
        
        <div class="form-outline">
            <input type="month" required name="edit_month" id="edit_month" class="form-control" />
            <label class="form-label" for="form12"> الشهر </label>
        </div>
        <br>
        <div class="form-outline">
            <select required name="edit_bank"  class="form-control">
              <option value="" id="edit_bank"></option>
              @foreach ($banks as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
            <input type="hidden" />
            <label class="form-label" for="form12"> الخزينة </label>
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
        $(document).on("click", ".edit_payroll", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/ajax.get.payroll",
          data:{id:id},
          success:function (html) {
            $("#id").val(html.data.id);
            $("#edit_user").html(html.data.username);
            $("#edit_user").val(html.data.user);
            $("#edit_wage").val(html.data.wage);
            $("#edit_month").val(html.data.month);
            $("#edit_bank").html(html.data.bank_name);
            $("#edit_bank").val(html.data.bank);
            $("#EditModal .modal-body .form-label").css("top", "-12px")
            $("#EditModal .modal-body .form-label").css("background", "#fff")
            $("#EditModal .modal-body .form-label").css("padding", "0px 10px")
            $("#EditModal .modal-body .form-label").css("z-index", "100")
          }
        });
      });

</script>
@endsection