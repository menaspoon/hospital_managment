@extends('master')
@section('content')
{{--
  https://xn--mgbkt9eckr.net/threads/%D8%AC%D8%A7%D8%B1%D9%8A-%D8%A7%D9%84%D8%AF%D9%83%D8%AA%D9%88%D8%B1-%D9%88%D8%B9%D9%8A%D9%84%D8%AA%D9%87-%D9%80-%D8%AD%D8%AA%D9%8A-%D8%A7%D9%84%D8%AC%D8%B2%D8%A1-%D8%A7%D9%84%D8%AB%D8%A7%D9%84%D8%AB.203623/
--}}
<div class="companies container">
  <div class="row">
    <div class="col-md-6">
      <h2> اداوات المستشفي </h2>
    </div>
    <div class="col-md-6">
      <button type="button" style="float: left" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          اضافة  
      </button>
      <a href="create.purchases.tools" style="float: left" class="btn btn-primary" >
          استخراج
      </a>
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
      <th scope="col">تحكم</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($tools as $item)
      <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>{{ $item->name }}</td>
          <td>{{ $item->count }}</td>
          <td>
            <a data-id="{{ $item->id }}" data-table="tools" class="tools actions"><i class="far fa-trash-alt"></i></a>
            <a data-id="{{ $item->id }}" class="edit_tools actions" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
            <i data-id="{{ $item->id }}" class="fal fa-shovel-snow extractionModal actions" data-bs-toggle="modal" data-bs-target="#extractionModal">e</i>
          </td>
        </tr>
      @endforeach
  </tbody>
</table>





  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route("store.tools") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> اضافة </h5>
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
      <form action="{{ route("update.tools") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> تحديث البيانات   </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="">
              <label class="form-label" for="form12"> الاســــــم  </label>
              <input type="hidden" required name="id" id="id" class="form-control" />
              <input type="text" required name="edit_name" id="name" class="form-control" />
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



  <!-- FormModal -->
  <div class="modal fade" id="extractionModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route("store.extraction.tool") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> استخراج </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="">
              <label class="form-label" for="form12"> العدد  </label>
              <input type="hidden" required name="countToolID" id="countToolID" class="form-control" />
              <input type="text" required name="countTool" id="countTool" class="form-control" />
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
  $(document).on("click", ".extractionModal", function(e) {
      e.preventDefault()
      var id = $(this).data("id");  
      $("#countToolID").val();
  });
      $(document).on("click", ".edit_tools", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/hospital/ajax.get.tools",
          data:{id:id },
          success:function (html) {
            $("#EditModal .modal-body #id").val(html.data.id);
            $("#EditModal .modal-body #name").val(html.data.name);
          }
        });
      });

</script>
@endsection