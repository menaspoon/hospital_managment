@extends('master')
@section('content')

<div class="companies container-fuild">
 

<div class="dashbord">
  <div class="counts">
    <div class="row">
      <div class="col-md-2">
        <div class="box" style="background:#EE5A24">
          <span>الحجــــز</span>
          <strong> {{ $count_all }} <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#009432">
          <span>الحجــــز العام</span>
          <strong> {{ $count_normal }} <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#0652DD">
          <span>حجــــز التامين</span>
          <strong> {{ $count_insurance }} <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#1B1464">
          <span> قوائم الانتظار </span>
          <strong> {{ $count_wating }} <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#ccae62">
          <span>  تم الانتهاء </span>
          <strong> {{ $count_done }} <b>مرضــي</b> </strong>
        </div>
      </div>
      <div class="col-md-2">
        <div class="box" style="background:#227093">
          <span>   حجز اونلاين </span>
          <strong> {{ $count_online }} <b>مرضــي</b> </strong>
        </div>
      </div>
    </div>
  </div>
</div>



<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    حجز كشف موظف تامين
</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singleModal">
  حجز كشف  
</button>
<br><br>
{{--
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">الشركة</th>
            <th scope="col">المريض</th>
            <th scope="col">القسم</th>
            <th scope="col">الكشف</th>
            <th scope="col">السعر</th>
            <th scope="col">الدكتور</th>
            <th scope="col">ميعاد الحجز</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($recepion_insurance as $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->company_name }}</td>
                <td>{{ $item->emp_name }} </td>
                <td>{{ $item->category_name }} </td>
                <td>
                  @foreach ($MedicalExaminationBooking as $booking)
                    @if ($booking->name == $item->id)
                        {{ $booking->booking_name }} -
                    @endif
                  @endforeach
                </td>
                <td>
                  @foreach ($MedicalExaminationBooking as $booking)
                    @if ($booking->name == $item->id)
                        {{ $booking->price }} -
                    @endif
                  @endforeach
                  دينار </td>
                <td>{{ $item->doctor }} </td>
                <td>{{ $item->created }} </td>
              </tr>
            @endforeach
        </tbody>
      </table>







      <div class="list-category" id="feature">
        <div class="container">
            <h2> الاقســـــــام العامة </h2>
   
            @foreach ($category as $item)
              <div class="item" data-id="{{ $item->id }}">
                  <h5>{{ $item->name }}<i class="fal fa-plus"></i></h5>
                  @foreach ($MedicalExamination as $examination)
                      @if ($item->id == $examination->category)
                      <p class="links examination_{{ $examination->category }}"> <a href="examination/{{ $examination->id }}"> {{ $examination->name }} </a> </p>
                      @endif
                  @endforeach
              </div>
            @endforeach

        </div>
      </div>
--}}


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <form action="{{ route("store.recepion") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> بيانات المريض  </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <input type="hidden" name="type" value="normal">
          <div class="form-outline">
              <input type="text" required name="name" id="form12" class="form-control" />
              <label class="form-label" for="form12"> اسم المريض </label>
          </div>
          <br>
          <div class="form-outline">
              <input type="number" required name="phone" id="form12" class="form-control" />
              <label class="form-label" for="form12"> رقم الهاتف </label>
          </div>
          <br>
          

            <div id="result_insurance_number"></div>
            <button type="summit" class="btn btn-primary query_insurance_number"> استعلام </button>

            <br>
            <br>
            {{--
            <div class="form-outline">
                <select name="category"  id="form12" class="form-control select_category" >
                  <option value=""></option>
                    @foreach ($categories as $item)
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name=""   id="form12" class="form-control">
                <label class="form-label" for="form12"> القسم </label>
            </div>
            <br>
            --}}

            {{------------ الفحوصات ----------}} 
            <div class="copy_insurance_medical_examination" style="display: none">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-outline">
                      <select required class="form-control" name="medical_examination[]" >
                          <option value="0">الكشف</option>
                          @foreach ($MedicalExamination as $mid)
                            <option value="{{ $mid->id }}">{{ $mid->name }}</option>
                          @endforeach
                      </select>
                      <input type="hidden"   id="form12" class="form-control">
                      <label class="form-label" for="form12">  </label>
                  </div><br>
                </div>
                <div class="col-md-2">
                  <div class="form-outline">
                    <select name="medical_doctor[]"  id="form12" class="form-control" >
                      <option value="0"></option>
                      @foreach ($doctor as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden"   id="form12" class="form-control">
                    <label class="form-label" for="form12"> الدكتور </label>
                  </div><br>
                </div>
              </div>
              <br>
            </div> <!-- copy_insurance_medical_examination -->
            <div class="print_insurance_medical_examination row"></div>
            {{------------ الفحوصات ----------}} 


            {{------------ التحاليل ----------}} 
            <div class="copy_insurance_analytics" style="display: none">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-outline">
                    <select required id="form12" class="form-control" name="analytics[]">
                      <option value="0">التحاليل</option>
                      @foreach ($analyticsDepartment as $category)
                        <optgroup style="color: #EE5A24" label="{{ $category->name }}">
                          @foreach ($analytics as $item)
                            @if ($category->id == $item->category)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                          @endforeach
                        </optgroup>
                      @endforeach
                    </select>
                      <input type="hidden"   id="form12" class="form-control">
                      <label class="form-label" for="form12">  </label>
                  </div><br>
                </div>
                <div class="col-md-2">
                  <div class="form-outline">
                    <select name="analytics_doctor[]"  id="form12" class="form-control" >
                      <option value="0"></option>
                      @foreach ($doctor as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden"   id="form12" class="form-control">
                    <label class="form-label" for="form12"> الدكتور </label>
                  </div><br>
                </div>
              </div>
              <br>
            </div> <!-- copy_insurance_medical_examination -->
            <div class="print_insurance_analytics row"></div>
            {{------------ التحاليل ----------}} 


            {{------------ اشعة ----------}} 
            <div class="copy_insurance_ray" style="display: none">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-outline">
                    <select required id="form12" class="form-control" name="ray[]">
                      <option value="0">الاشعة</option>
                      @foreach ($rayDepartment as $category)
                        <optgroup style="color: #EE5A24" label="{{ $category->name }}">
                          @foreach ($ray as $item)
                            {{-- @if ($category->id == $item->category) --}}
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            {{-- @endif --}}
                          @endforeach
                        </optgroup>
                      @endforeach
                    </select>
                      <input type="hidden"   id="form12" class="form-control">
                      <label class="form-label" for="form12">  </label>
                  </div><br>
                </div>
                <div class="col-md-2">
                  <div class="form-outline">
                    <select name="ray_doctor[]"  id="form12" class="form-control" >
                      <option value="0"></option>
                      @foreach ($doctor as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden"   id="form12" class="form-control">
                    <label class="form-label" for="form12"> الدكتور </label>
                  </div><br>
                </div>
              </div>
              <br>
            </div> <!-- copy_insurance_medical_examination -->
            <div class="print_insurance_ray row"></div>
            {{------------ اشعة ----------}} 


            {{------------ العمليات ----------}} 
            <div class="copy_insurance_surgery" style="display: none">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-outline">
                    <select required id="form12" class="form-control" name="surgery[]">
                      <option value="0">العمليات</option>
                      @foreach ($surgeryDepartment as $category)
                        <optgroup style="color: #EE5A24" label="{{ $category->name }}">
                          @foreach ($surgery as $item)
                            @if ($category->id == $item->category)
                              <option style="color: #000" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                          @endforeach
                        </optgroup>
                      @endforeach
                    </select>
                      <input type="hidden"   id="form12" class="form-control">
                      <label class="form-label" for="form12">  </label>
                  </div><br>
                </div>
                <div class="col-md-2">
                  <div class="form-outline">
                    <select name="surgery_doctor[]"  id="form12" class="form-control" >
                      <option value="0"></option>
                      @foreach ($doctor as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden"   id="form12" class="form-control">
                    <label class="form-label" for="form12"> الدكتور </label>
                  </div><br>
                </div>
              </div>
              <br>
            </div> <!-- copy_insurance_medical_examination -->
            <div class="print_insurance_surgery row"></div>
            {{------------ العمليات ----------}} 



            {{------------ الطوارئ ----------}} 
            <div class="copy_insurance_emergency" style="display: none">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-outline">
                    <select required id="form12" class="form-control" name="emergency[]">
                      <option value="0">الطوارئ</option>
                      @foreach ($emergencyDepartment as $category)
                        <optgroup style="color: #EE5A24" label="{{ $category->name }}">
                          @foreach ($emergency as $item)
                            @if ($category->id == $item->category)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                          @endforeach
                        </optgroup>
                      @endforeach
                    </select>
                      <input type="hidden"   id="form12" class="form-control">
                      <label class="form-label" for="form12">  </label>
                  </div><br>
                </div>
                <div class="col-md-2">
                  <div class="form-outline">
                    <select name="emergency_doctor[]"  id="form12" class="form-control" >
                      <option value="0"></option>
                      @foreach ($doctor as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden"   id="form12" class="form-control">
                    <label class="form-label" for="form12"> الدكتور </label>
                  </div><br>
                </div>
              </div>
              <br>
            </div> <!-- copy_insurance_emergency -->
            <div class="print_insurance_emergency row"></div>
            {{------------ الطوارئ ----------}}   



            {{------------ العناية المركزة ----------}} 
            <div class="copy_insurance_intensiveCare" style="display: none">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-outline">
                    <select required id="form12" class="form-control" name="intensiveCare[]">
                      <option value="0"> العناية المركزة </option>
                      @foreach ($intensiveCareDepartment as $category)
                        <optgroup style="color: #EE5A24" label="{{ $category->name }}">
                          @foreach ($intensiveCare as $item)
                            @if ($category->id == $item->category)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                          @endforeach
                        </optgroup>
                      @endforeach
                    </select>
                      <input type="hidden"   id="form12" class="form-control">
                      <label class="form-label" for="form12">  </label>
                  </div><br>
                </div>
                <div class="col-md-2">
                  <div class="form-outline">
                    <select name="intensiveCare_doctor[]"  id="form12" class="form-control" >
                      <option value="0"></option>
                      @foreach ($doctor as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden"   id="form12" class="form-control">
                    <label class="form-label" for="form12"> الدكتور </label>
                  </div><br>
                </div>
              </div>
              <br>
            </div> <!-- copy_insurance_emergency -->
            <div class="print_insurance_intensiveCare row"></div>
            {{------------ العناية المركزة ----------}} 



            {{------------  العلاج الطبيعـــي  ----------}} 
            <div class="copy_insurance_physical_therapy" style="display: none">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-outline">
                    <select required id="form12" class="form-control" name="physical_therapy[]">
                      <option value="0">  العلاج الطبيعـــي </option>
                      @foreach ($physicalTherapyDepartment as $category)
                        <optgroup style="color: #EE5A24" label="{{ $category->name }}">
                          @foreach ($physicalTherapy as $item)
                            @if ($category->id == $item->category)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                          @endforeach
                        </optgroup>
                      @endforeach
                    </select>
                      <input type="hidden"   id="form12" class="form-control">
                      <label class="form-label" for="form12">  </label>
                  </div><br>
                </div>
                <div class="col-md-2">
                  <div class="form-outline">
                    <select name="physical_therapy_doctor[]"  id="form12" class="form-control" >
                      <option value="0"></option>
                      @foreach ($doctor as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden"   id="form12" class="form-control">
                    <label class="form-label" for="form12"> الدكتور </label>
                  </div><br>
                </div>
              </div>
              <br>
            </div> <!-- copy_insurance_emergency -->
            <div class="print_insurance_physical_therapy row"></div>
            {{------------  العلاج الطبيعـــي  ----------}} 
            <br>


            {{------------  العلاج الطبيعـــي  ----------}} 
            <div class="copy_insurance_quartering" style="display: none">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-outline">
                    <select required id="form12" class="form-control" name="quartering[]">
                      <option value="0"> الايــواء </option>
                      @foreach ($quarteringDepartment as $category)
                        <optgroup style="color: #EE5A24" label="{{ $category->name }}">
                          @foreach ($quartering as $item)
                            @if ($category->id == $item->category)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif
                          @endforeach
                        </optgroup>
                      @endforeach
                    </select>
                      <input type="hidden"   id="form12" class="form-control">
                      <label class="form-label" for="form12">  </label>
                  </div><br>
                </div>
                <div class="col-md-2">
                  <div class="form-outline">
                    <select name="quartering_doctor[]"  id="form12" class="form-control" >
                      <option value="0"></option>
                      @foreach ($doctor as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                    <input type="hidden"   id="form12" class="form-control">
                    <label class="form-label" for="form12"> الدكتور </label>
                  </div><br>
                </div>
              </div>
              <br>
            </div> <!-- copy_insurance_emergency -->
            <div class="print_insurance_quartering row"></div>
            {{------------ العناية المركزة ----------}} 
            
            <br>

        </div>
        <div class="modal-footer">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-info btn-sm">
              <input type="radio" class="new_row_medicals" name="options" id="option2" autocomplete="off"> فحوصات
            </label>
            <label class="btn btn-info btn-sm">
              <input type="radio" class="new_row_analytics" name="options" id="option3" autocomplete="off"> تحاليل
            </label>
            <label class="btn btn-info btn-sm">
              <input type="radio" class="new_row_ray" name="options" id="option1" autocomplete="off" checked> اشعة
            </label>
            <label class="btn btn-info btn-sm">
              <input type="radio" class="new_row_surgery" name="options" id="option3" autocomplete="off"> عمليات
            </label>
            <label class="btn btn-info btn-sm">
              <input type="radio" class="new_row_emergency" name="options" id="option3" autocomplete="off"> طوارئ
            </label>
            <label class="btn btn-info btn-sm">
              <input type="radio" class="new_row_intensiveCare" name="options" id="option3" autocomplete="off"> عناية مركزة
            </label>
            <label class="btn btn-info btn-sm">
              <input type="radio" class="new_row_quartering" name="options" id="option3" autocomplete="off"> ايواء
            </label>
            <label class="btn btn-info btn-sm">
              <input type="radio" class="btn_row_physical_therapy" name="options" id="option3" autocomplete="off">  علاج طبيعي
            </label>
          </div>
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">اغلاق</button>
          <button type="summit" class="btn btn-primary btn-sm"> حفظ البيانات </button>
        </div>
      </form>
    </div>
  </div>





</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).on("click", ".query_insurance_number", function(event) {
    event.preventDefault()
    var insurance_number     = $("#insurance_number").val();
    $.ajax({
      url: "/query.insurance.number",
      data:{insurance_number:insurance_number },
      success:function (data) {
        $("#result_insurance_number").html(data);
        }
    });
});


// Ø§Ø³ØªØ¯Ø¹Ø§Ø¡ Ø§Ù„Ø§Ù‚Ø³Ø§Ù… Ø§Ù„ÙØ±Ø¹ÙŠØ©
$(".select_category").change(function(){
  var id = $(this).val();
  $.ajax({
      url:"/ajax.get.medical.examination",
      method:"get",
      data:{id:id},
      success:function(data) {
        $(".medical_examination").html(data);
      }
  });
});   

$(".list-category .item").click(function(){
  var category = $(this).data("id");
    $(".links").hide(600);
    $(".examination_" + category).show(600);
});

// الفحوصات
$(document).on("click", ".new_row_medicals", function () {
  $(".print_insurance_medical_examination").append($(".copy_insurance_medical_examination .row").html());
});
// التحاليل
$(document).on("click", ".new_row_analytics", function () {
  $(".print_insurance_analytics").append($(".copy_insurance_analytics .row").html());
});
// التحاليل
$(document).on("click", ".new_row_ray", function () {
  $(".print_insurance_ray").append($(".copy_insurance_ray .row").html());
});
// العمليات
$(document).on("click", ".new_row_surgery", function () {
  $(".print_insurance_surgery").append($(".copy_insurance_surgery .row").html());
});
// الطوارئ
$(document).on("click", ".new_row_emergency", function () {
  $(".print_insurance_emergency").append($(".copy_insurance_emergency .row").html());
});
// العناية المركزة
$(document).on("click", ".new_row_intensiveCare", function () {
  $(".print_insurance_intensiveCare").append($(".copy_insurance_intensiveCare .row").html());
});
// العلاج الطبيعي
$(document).on("click", ".btn_row_physical_therapy", function () {
  $(".print_insurance_physical_therapy").append($(".copy_insurance_physical_therapy .row").html());
});
// الايواء
$(document).on("click", ".new_row_quartering", function () {
  $(".print_insurance_quartering").append($(".copy_insurance_quartering .row").html());
});
</script>




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
@endsection