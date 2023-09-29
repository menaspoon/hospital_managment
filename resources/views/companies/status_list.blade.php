@extends('master')
@section('content')
https://www.freepik.com/free-psd/e-learning-banner-template_12810377.htm#page=9&query=education%20post&position=34&from_view=search&track=ais
<div class="companies container-fuild">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  الطـــــــوارئ
</button>
<br><br>

<div class="row">
  <div class="col-md-4">
    <h5>التحـــــاليل</h5>
    <?php $num = 1; ?>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الطـــــــوارئ</th>
            <th scope="col">النسبة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach ($analyticsApproveCompany as $item)
            <tr>
              <td scope="col">{{ $num++ }}</td>
              <td scope="col">{{ $item->analytics }}</td>
              <td scope="col">{{ $item->precent }}%</td>
              <td class="actions"> 
                <a data-id="{{ $item->id }}" data-table="analytics_approve_company" class="delete"><i class="far fa-trash-alt"></i></a>
                <a data-id="{{ $item->id }}" data-table="analytics_approve_company"  class="edit_item" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div><br><br>
  </div>

  <div class="col-md-4">
    <h5>الفحوصات</h5>
    <?php $num = 1; ?>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الفحص</th>
            <th scope="col">النسبة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($MedicalExaminationCompany as $item)
            <tr>
              <td scope="col">{{ $num++ }}</td>
              <td scope="col">{{ $item->medical_examination }}</td>
              <td scope="col">{{ $item->precent }}%</td>
              <td class="actions"> 
                <a data-id="{{ $item->id }}" data-table="medical_examination_approve_company" class="delete"><i class="far fa-trash-alt"></i></a>
                <a data-id="{{ $item->id }}" data-table="medical_examination_approve_company"  class="edit_item" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div> <br><br>
  </div>


  <div class="col-md-4">
    <h5>العمليات</h5>
    <?php $num = 1; ?>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الفحص</th>
            <th scope="col">النسبة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($surgeryApproveCompany as $item)
            <tr>
              <td scope="col">{{ $num++ }}</td>
              <td scope="col">{{ $item->surgery }}</td>
              <td scope="col">{{ $item->precent }}%</td>
              <td class="actions"> 
                <a data-id="{{ $item->id }}" data-table="surgery_approve_company" class="delete"><i class="far fa-trash-alt"></i></a>
                <a data-id="{{ $item->id }}" data-table="surgery_approve_company"  class="edit_item" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div><br><br>
  </div>

  <div class="col-md-4">
    <h5>العمليات</h5>
    <?php $num = 1; ?>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الفحص</th>
            <th scope="col">النسبة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($emergencyApproveCompany as $item)
            <tr>
              <td scope="col">{{ $num++ }}</td>
              <td scope="col">{{ $item->emergency }}</td>
              <td scope="col">{{ $item->precent }}%</td>
              <td class="actions"> 
                <a data-id="{{ $item->id }}" data-table="emergency_approve_company" class="delete"><i class="far fa-trash-alt"></i></a>
                <a data-id="{{ $item->id }}" data-table="emergency_approve_company"  class="edit_item" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div><br><br>
  </div>

  <div class="col-md-4">
    <h5>الاشعـــــة</h5>
    <?php $num = 1; ?>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الفحص</th>
            <th scope="col">النسبة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($rayApproveCompany as $item)
            <tr>
              <td scope="col">{{ $num++ }}</td>
              <td scope="col">{{ $item->ray }}</td>
              <td scope="col">{{ $item->precent }}%</td>
              <td class="actions"> 
                <a data-id="{{ $item->id }}" data-table="ray_approve_company" class="delete"><i class="far fa-trash-alt"></i></a>
                <a data-id="{{ $item->id }}" data-table="ray_approve_company"  class="edit_item" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <br><br>
  </div>



  <div class="col-md-4">
    <h5>العناية المركزة</h5>
    <?php $num = 1; ?>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الفحص</th>
            <th scope="col">النسبة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($intensiveCarApproveCompany as $item)
            <tr>
              <td scope="col">{{ $num++ }}</td>
              <td scope="col">{{ $item->intensive_care }}</td>
              <td scope="col">{{ $item->precent }}%</td>
              <td class="actions"> 
                <a data-id="{{ $item->id }}" data-table="intensive_care_approve_company" class="delete"><i class="far fa-trash-alt"></i></a>
                <a data-id="{{ $item->id }}" data-table="intensive_care_approve_company"  class="edit_item" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <br><br>
  </div>



  <div class="col-md-4">
    <h5> العلاج الطبيعي </h5>
    <?php $num = 1; ?>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الفحص</th>
            <th scope="col">النسبة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($physical_therapyApproveCompany as $item)
            <tr>
              <td scope="col">{{ $num++ }}</td>
              <td scope="col">{{ $item->physical_therapy }}</td>
              <td scope="col">{{ $item->precent }}%</td>
              <td class="actions"> 
                <a data-id="{{ $item->id }}" data-table="physical_therapy_approve_company" class="delete"><i class="far fa-trash-alt"></i></a>
                <a data-id="{{ $item->id }}" data-table="physical_therapy_approve_company"  class="edit_item" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <br><br>
  </div>
  
  <div class="col-md-4">
    <h5> الايــــــواء </h5>
    <?php $num = 1; ?>
    <div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الفحص</th>
            <th scope="col">النسبة</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($quartering_approve_company as $item)
            <tr>
              <td scope="col">{{ $num++ }}</td>
              <td scope="col">{{ $item->quartering }}</td>
              <td scope="col">{{ $item->precent }}%</td>
              <td class="actions"> 
                <a data-id="{{ $item->id }}" data-table="quartering_approve_company" class="delete"><i class="far fa-trash-alt"></i></a>
                <a data-id="{{ $item->id }}" data-table="quartering_approve_company"  class="edit_item" data-bs-toggle="modal" data-bs-target="#EditModal"><i class="far fa-pencil-alt"></i></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <br><br>
  </div>


</div>

 

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <form action="{{ route("store.companies.status") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">اضافة </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              @csrf
              <input type="hidden" name="company" value="{{ request()->route('company') }}">
              
              <div class="">
                <label class="form-label" for="form12"> التحاليل </label> <br>
                  <select class="js-example-basic-multiple form-control" name="analytics[]" multiple="multiple">
                    @foreach ($analyticsDepartment as $category)
                      <optgroup label="{{ $category->name }}">
                        @foreach ($analytics as $item)
                          @if ($category->id == $item->category)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                  <input type="hidden"   id="form12" class="form-control">
              </div>

              <div class="">
                <label class="form-label" for="form12"> الكشف </label> <br>
                  <select class="js-example-basic-multiple form-control" name="medical_examination[]" multiple="multiple">
                    @foreach ($categories as $category)
                      <optgroup label="{{ $category->name }}">
                        @foreach ($MedicalExamination as $Medical)
                          @if ($category->id == $Medical->category)
                            <option value="{{ $Medical->id }}">{{ $Medical->name }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                  <input type="hidden"   id="form12" class="form-control">
              </div> <br>

              <div class="">
                <label class="form-label" for="form12"> الاشعـــــة </label> <br>
                  <select class="js-example-basic-multiple form-control" name="ray[]" multiple="multiple">
                    @foreach ($rayDepartment as $category)
                      <optgroup label="{{ $category->name }}">
                        @foreach ($ray as $item)
                          @if ($category->id == $item->category)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                  <input type="hidden"   id="form12" class="form-control">
              </div> <br>

              <div class="">
                <label class="form-label" for="form12"> العملــــيات </label> <br>
                  <select class="js-example-basic-multiple form-control" name="surgery[]" multiple="multiple">
                    @foreach ($surgeryDepartment as $category)
                      <optgroup label="{{ $category->name }}">
                        @foreach ($surgery as $item)
                          @if ($category->id == $item->category)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                  <input type="hidden"   id="form12" class="form-control">
              </div>
              <br>
              
              <div class="">
                <label class="form-label" for="form12"> الطـــــــوارئ </label> <br>
                  <select class="js-example-basic-multiple form-control" name="emergency[]" multiple="multiple">
                    @foreach ($emergencyDepartment as $category)
                      <optgroup label="{{ $category->name }}">
                        @foreach ($emergency as $item)
                          @if ($category->id == $item->category)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                  <input type="hidden"   id="form12" class="form-control">
              </div>
              <br>
              
              <div class="">
                <label class="form-label" for="form12"> العناية المركزة </label> <br>
                  <select class="js-example-basic-multiple form-control" name="intensive_care[]" multiple="multiple">
                    @foreach ($intensiveCareDepartment as $category)
                      <optgroup label="{{ $category->name }}">
                        @foreach ($intensiveCare as $item)
                          @if ($category->id == $item->category)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                  <input type="hidden"   id="form12" class="form-control">
              </div>
              <br>

              <div class="">
                <label class="form-label" for="form12"> العلاج الطبيعي </label> <br>
                  <select class="js-example-basic-multiple form-control" name="physical_therapy[]" multiple="multiple">
                    @foreach ($physicalTherapyDepartment as $category)
                      <optgroup label="{{ $category->name }}">
                        @foreach ($physicalTherapy as $item)
                          @if ($category->id == $item->category)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                  <input type="hidden"   id="form12" class="form-control">
              </div>
              <br>

              <div class="">
                <label class="form-label" for="form12"> الايواء </label> <br>
                  <select class="js-example-basic-multiple form-control form-control-lg" name="quartering[]" multiple="multiple">
                    @foreach ($quarteringDepartment as $category)
                      <optgroup label="{{ $category->name }}">
                        @foreach ($quartering as $item)
                          @if ($category->id == $item->category)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endif
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                  <input type="hidden"   id="form12" class="form-control">
              </div>
              <br>



            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
              <button type="submit" class="btn btn-primary"> حفــــظ </button>
            </div>
          </form>
        </div>
      </div>


</div>



    <!-- Modal -->
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form action="{{ route("update.companies.status") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> تحديث البيانات  </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id" name="id" />
            <input type="hidden" id="table" name="table" />
            <div class="form-outline">
                  <input type="number" required name="precent" id="precent" class="form-control" />
                  <label class="form-label" for="form12"> النسبة  </label>
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


<style>
  .select2-container--default .select2-results>.select2-results__options {
    max-height: 200px;
    overflow-y: auto;
    width: 330px;
    background: #fff;
    padding: 10px;
    z-index: 9999999999999999 !important;
    position: absolute !important
}

.modal { z-index: 1045; }



.select2-container--default .select2-selection--multiple .select2-selection__choice { background-color: #ffc107 !important; }
.select2-container--default .select2-results>.select2-results__options { max-height: 500px !important; }

</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).on("click", ".edit_item", function(event) {
    event.preventDefault()
    var id      = $(this).data("id");
    var table   = $(this).data("table");
    $.ajax({
      url: "/ajax.get.approve.status.company",
      data:{id:id, table:table},
      success:function (html) {
            $("#EditModal .modal-body #id").val(html.data.id);
            $("#EditModal .modal-body #precent").val(html.data.precent);
            $("#EditModal .modal-body #table").val(table);
        
            $("#EditModal .modal-body .form-label").css("text-align", "left")
          }
        });
});

</script>

@endsection