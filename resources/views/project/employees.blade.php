@extends('master')
@section('content')

<div class="companies container-fuild">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    اضافة  موظف
</button>
<br><br>
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
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاســـم</th>
            <th scope="col"> بيانات التواصل</th>
            <th scope="col">العنوان</th>
            <th scope="col">القرابة</th>
            <th scope="col">فصيلة الدم</th>
            <th scope="col">الجنسية</th>
            <th scope="col">الجنس</th>
            <th scope="col">رقم الهاوية</th>
            <th scope="col">رقم التامين</th>
            <th scope="col"> تاريخ الميلاد</th>
            <th scope="col">المبلغ</th>
            <th scope="col"> المبلغ المتبقي </th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>  <a href="tel:{{ $item->phone }}">{{ $item->phone }}</a> <br> <a href="mailto:{{ $item->email }}">{{ $item->email }}</a> </td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->relative_relation }}</td>
                <td>{{ $item->blood_type }}</td>
                <td>{{ $item->nationality }}</td>
                <td>{{ $item->sex }}</td>
                <td>{{ $item->card_id }}</td>
                <td>{{ $item->insurance_number }} </td>
                <td>{{ $item->date_of_birth }}</td>
                <td>{{ $item->balance }}</td>
                <td>{{ $item->remaining_amount }} </td>
                <td>
                  <a data-id="{{ $item->id }}" data-table="employees" class="delete"><i class="far fa-trash-alt"></i></a>
                  <a data-id="{{ $item->id }}" class="edit_employees" data-bs-toggle="modal" data-bs-target="#editModal"><i class="far fa-pencil-alt"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>










  
  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <form action="{{ route("store.employees") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> بيانات الموظف  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <input type="hidden" name="company" value="{{ request()->route('company') }}" />

        <div class="modal-body row">

            <div class=" col-md-6">
                <label class="form-label" for="form12"> اسم المومن علية </label>
                <input type="text" required name="name" id="form12" class="form-control" />
            </div>
            <br>
            <div class=" col-md-6">
                <label class="form-label" for="form12"> اسم الموظف </label>
                <select name="employees" class="form-control">
                  <option value=""></option>
                  @foreach ($data as $item)
                    <option value="{{  $item->id }}"> {{  $item->name }} </option>
                  @endforeach
                </select>
            </div>
            <br>
            <div class="col-md-6">
              <label class="form-label" for="form12"> رقم الهاتف </label>
                <input type="number" required name="phone" id="form12" class="form-control" />
            </div>
            <br>
            <div class="col-md-6">
              <label class="form-label" for="form12"> البريد الالكتروني </label>
                <input type="email" required name="email" id="form12" class="form-control" />
            </div>
            <br>
            <div class="col-md-6">
              <label class="form-label" for="form12"> العنوان </label>
                <input type="text" required name="address" id="form12" class="form-control" />
            </div>
            <br>
            <div class="col-md-6">
              <label class="form-label" for="form12"> الجنس </label>
                <select name="sex" id="form12" class="form-control">
                  <option value="رجل">رجل</option>
                  <option value="انثي">انثي</option>
                </select>
            </div>
            <br>
            <div class="col-md-6">
                <label class="form-label" for="form12"> فصيلة الدم </label>
                <select name="blood_type" id="form12" class="form-control">
                  <option value="A+"> ( A+ ) </option>
                  <option value="A-"> ( A- ) </option>
                  <option value="B+"> ( B+ ) </option>
                  <option value="B-"> ( B- ) </option>
                  <option value="O+"> ( O+ ) </option>
                  <option value="O-"> ( O- ) </option>
                  <option value="AB+"> ( AB+ ) </option>
                  <option value="AB-"> ( AB- ) </option>
                </select>
            </div>
            <br>
            <div class="col-md-6">
                <label class="form-label" for="form12"> الجنسية </label>
                <input type="text" required name="nationality" id="form12" class="form-control" />
            </div>
            <br>
            <div class="col-md-6">
                <label class="form-label" for="form12"> رقم الهاوية </label>
                <input type="text" required name="card_id" id="form12" class="form-control" />
            </div>
            <br>
            <div class="col-md-6">
              <label class="form-label" for="form12"> صلة القرابة </label>

              <select name="relative_relation" id="form12" class="form-control">
                <option value="fathor">الاب</option>
                <option value="wife">الزوجة</option>
                <option value="son">الابن</option>
                <option value="girl">الابنة</option>
              </select>
          </div>
          <br>

          <div class="col-md-6">
              <label class="form-label" for="form12"> تاريخ الميلاد  </label>
              <input type="date" required name="date_of_birth" id="form12" class="form-control" />
          </div>
          <br>

            <div class="col-md-6">
                <label class="form-label" for="form12"> رقم التامين </label>
                <input type="text" required name="insurance_number" id="form12" class="form-control" />
            </div>
            <br>
            <div class="col-md-6">
                <label class="form-label" for="form12"> مبلغ التامين </label>
                <input type="number" required  name="balance" id="form12" class="form-control" />
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
  <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <form action="{{ route("update.employees") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> بيانات الموظف  </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <input type="hidden" name="id" id="id"  />

      <div class="modal-body row">

          <div class=" col-md-6">
              <label class="form-label" for="form12"> اسم المومن علية </label>
              <input type="text" required name="edit_name" id="name" class="form-control" />
          </div>
          <br>
          <div class=" col-md-6">
              <label class="form-label" for="form12"> اسم الموظف </label>
              <select name="edit_employees" class="form-control">
                <option value=""></option>
                @foreach ($data as $item)
                  <option value="{{  $item->id }}"> {{  $item->name }} </option>
                @endforeach
              </select>
          </div>
          <br>
          <div class="col-md-6">
            <label class="form-label" for="form12"> رقم الهاتف </label>
              <input type="number" required name="edit_phone" id="phone" class="form-control" />
          </div>
          <br>
          <div class="col-md-6">
            <label class="form-label" for="form12"> البريد الالكتروني </label>
              <input type="email" required name="edit_email" id="email" class="form-control" />
          </div>
          <br>
          <div class="col-md-6">
            <label class="form-label" for="form12"> العنوان </label>
              <input type="text" required name="edit_address" id="address" class="form-control" />
          </div>
          <br>
          <div class="col-md-6">
            <label class="form-label" for="form12"> الجنس </label>
              <select name="edit_sex" id="sex" class="form-control">
                <option value="رجل">رجل</option>
                <option value="انثي">انثي</option>
              </select>
          </div>
          <br>
          <div class="col-md-6">
              <label class="form-label" for="form12"> فصيلة الدم </label>
              <select name="edit_blood_type" id="blood_type" class="form-control">
                <option value="A+"> ( A+ ) </option>
                <option value="A-"> ( A- ) </option>
                <option value="B+"> ( B+ ) </option>
                <option value="B-"> ( B- ) </option>
                <option value="O+"> ( O+ ) </option>
                <option value="O-"> ( O- ) </option>
                <option value="AB+"> ( AB+ ) </option>
                <option value="AB-"> ( AB- ) </option>
              </select>
          </div>
          <br>
          <div class="col-md-6">
              <label class="form-label" for="form12"> الجنسية </label>
              <input type="text" required name="edit_nationality" id="nationality" class="form-control" />
          </div>
          <br>
          <div class="col-md-6">
              <label class="form-label" for="form12"> رقم الهاوية </label>
              <input type="text" required name="edit_card_id" id="card_id" class="form-control" />
          </div>
          <br>
          <div class="col-md-6">
            <label class="form-label" for="form12"> صلة القرابة </label>

            <select name="edit_relative_relation" id="relative_relation" class="form-control">
              <option value="fathor">الاب</option>
              <option value="wife">الزوجة</option>
              <option value="son">الابن</option>
              <option value="girl">الابنة</option>
            </select>
        </div>
        <br>

        <div class="col-md-6">
            <label class="form-label" for="form12"> تاريخ الميلاد  </label>
            <input type="date" required name="edit_date_of_birth" id="date_of_birth" class="form-control" />
        </div>
        <br>

          <div class="col-md-6">
              <label class="form-label" for="form12"> رقم التامين </label>
              <input type="text" required name="edit_insurance_number" id="insurance_number" class="form-control" />
          </div>
          <br>
          <div class="col-md-6">
              <label class="form-label" for="form12"> مبلغ التامين </label>
              <input type="number" required  name="edit_balance" id="balance" class="form-control" />
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
        $(document).on("click", ".edit_employees", function(event) {
          event.preventDefault()
          var id     = $(this).data("id");
        $.ajax({
          url: "/hospital/ajax.get.edit.employees",
          data:{id:id },
          success:function (html) {
            $("#id").val(html.data.id);
            $("#editModal .modal-body #name").val(html.data.name);
            $("#editModal .modal-body #phone").val(html.data.phone);
            $("#editModal .modal-body #email").val(html.data.email);
            $("#editModal .modal-body #address").val(html.data.address);
            $("#editModal .modal-body #sex").val(html.data.sex);
            $("#editModal .modal-body #nationality").val(html.data.nationality);
            $("#editModal .modal-body #blood_type").val(html.data.blood_type);
            $("#editModal .modal-body #card_id").val(html.data.card_id);
            $("#editModal .modal-body #date_of_birth").val(html.data.date_of_birth);
            $("#editModal .modal-body #relative_relation").val(html.data.relative_relation);
            $("#editModal .modal-body #insurance_number").val(html.data.insurance_number);
            $("#editModal .modal-body #balance").val(html.data.balance);

            $("#EditModal .modal-body .form-label").css("top", "-12px")
            $("#EditModal .modal-body .form-label").css("background", "#fff")
            $("#EditModal .modal-body .form-label").css("padding", "0px 10px")
            $("#EditModal .modal-body .form-label").css("z-index", "100")
          }
        });
      });

</script>
@endsection