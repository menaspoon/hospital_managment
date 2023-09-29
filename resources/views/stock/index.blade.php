@extends('master')
@section('content')

<div class="companies container">
  <div class="row">
    <div class="col-md-6">
      <h2>المخـــزون</h2>
    </div>
    <div class="col-md-6">
      <button type="button" style="float: left" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          ترحيل فردي  
      </button>
      <button type="button" style="float: left" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sendModal">
           تسليم  
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
    <table class="table">
        <thead class="" style="background-color: #8bc34a;">
          <tr>
            <th scope="col">#</th>
            <th scope="col">المنتج</th>
            <th scope="col">العدد في المخزن</th>
            <th scope="col">العدد في المستشفي</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td> {{ $item->name }}  </td>
                <td> {{ $item->count_stock }} </td>
                <td> {{ $item->count_hospital }} </td>
                <td class="actions"> 
                  <a data-id="{{ $item->id }}" data-table="surgery" class="delete"><i class="far fa-trash-alt"></i></a>
                  <a data-id="{{ $item->id }}" data-bs-toggle="modal" class="edit_surgery" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>










  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ url("transformation.product") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">  اضافة   </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-outline">
              <select name="product" id="form12" class="form-control">
                <option value=""> </option>
                @foreach ($data as $item)
                  <option value="{{ $item->id }}"> {{ $item->name }} </option>
                @endforeach
              </select>
                <input type="hidden"  value="0"/>
                <label class="form-label" for="form12"> اختر المنتج  </label>
            </div>
            <br>
            <div class="form-outline">
              <select name="type" id="" id="form12" class="form-control">
                <option value=""> </option>
                <option value="to_hospital"> من المخزن الي العيادة </option>
                <option value="to_store"> من العيادة الي المخزن </option>
              </select>
                <input type="hidden"  value="0"/>
                <label class="form-label" for="form12"> اختر المنتج  </label>
            </div>
            <br>
            <div class="form-outline">
                <input type="number" required name="count" id="form12" class="form-control" value="0"/>
                <label class="form-label" for="form12"> العدد </label>
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
  <div class="modal fade" id="sendModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ url("receive.product") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> تسليم المنتج  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="copy_row row">
            <div class="col-md-9">
              <div class="form-outline">
                <select name="product[]" id="form12" class="form-control">
                  <option value=""> </option>
                  @foreach ($data as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                  @endforeach
                </select>
                  <input type="hidden"  value="0"/>
                  <label class="form-label" for="form12"> اختر المنتج  </label>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-outline">
                  <input type="text" required id="count[]" class="form-control" />
                  <label class="form-label" for="form12"> العدد  </label>
              </div>
            </div><br><br>
          </div> 

          <div class="print_row row">

          </div>

          <div class="form-outline">
            <select name="recipient" id="form12" class="form-control">
              <option value=""> </option>
              @foreach ($employee as $item)
                <option value="{{ $item->id }}"> {{ $item->name }} </option>
              @endforeach
            </select>
              <input type="hidden"  value="0"/>
              <label class="form-label" for="form12"> المستلم </label>
          </div> <br>
          <div class="form-outline">
            <select name="type" id="form12" class="form-control">
              <option value=""> </option>
              <option value="hospital">  المخزن  </option>
              <option value="store">  العيادة  </option>
            </select>
              <input type="hidden"  value="0"/>
              <label class="form-label" for="form12"> المكان </label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">اغلاق</button>
          <button type="button" class="btn btn_new_row btn-warning btn-sm" >اضافة</button>
          <button type="summit" class="btn btn-primary btn-sm"> حفظ البيانات </button>
        </div>
      </form>
    </div>
  </div>






</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

$(document).on("click", ".btn_new_row", function () {
  $(".print_row").append($(".copy_row").html());
});

        $(document).on("click", ".edit_surgery", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/ajax.get.surgery",
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