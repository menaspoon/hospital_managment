@extends('master')
@section('content')

<div class="companies container-fuild">
<br>

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">رقم الكشف</th>
            <th scope="col">المريض</th>
            <th scope="col">الكشف</th>
            <th scope="col">الاشعة</th>
            <th scope="col">السعر</th>
            <th scope="col">الدكتور</th>
            <th scope="col">ميعاد الحجز</th>
            <th scope="col">تحكم</th>
          </tr>
        </thead>
        <tbody>
          <?php $num = 1; ?>
          @foreach ($recepion_insurance as $item)
            <tr>
                <td>{{ $num++ }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->member_name }}</td>
                <td>{{ $item->emp_name }} </td>
                        
                <td>
                  @foreach ($MedicalExaminationBooking as $booking)
                    @if ($booking->name == $item->id)
                        <strong style="color: darkcyan;">{{ $booking->booking_name }}</strong> - <strong style="color: #dc3545;">{{ $booking->doctor_name }}</strong> <br>
                    @endif
                  @endforeach
                  @foreach ($analytic as $analy)
                    @if ($analy->name == $item->id)
                        <strong style="color: darkcyan;">{{ $analy->analytics_name }}</strong> - <strong style="color: #dc3545;">{{ $booking->doctor_name }}</strong> <br>
                    @endif
                  @endforeach
                  @foreach ($surgery as $sur)
                    @if ($sur->name == $item->id)
                        <strong style="color: darkcyan;">{{ $sur->surgery_name }}</strong> - <strong style="color: #dc3545;">{{ $booking->doctor_name }}</strong> <br>
                    @endif
                  @endforeach
                  @foreach ($ray as $r)
                    @if ($r->name == $item->id)
                        <strong style="color: darkcyan;">{{ $r->ray_name }}</strong> - <strong style="color: #dc3545;">{{ $booking->doctor_name }}</strong> <br>
                    @endif
                  @endforeach
                  @foreach ($emergency as $emer)
                    @if ($emer->name == $item->id)
                        <strong style="color: darkcyan;">{{ $emer->emergency_name }}</strong> - <strong style="color: #dc3545;">{{ $booking->doctor_name }}</strong> <br>
                    @endif
                  @endforeach
                  @foreach ($intensive_care as $care)
                    @if ($care->name == $item->id)
                        <strong style="color: darkcyan;">{{ $care->intensive_care_name }}</strong> - <strong style="color: #dc3545;">{{ $booking->doctor_name }}</strong> <br>
                    @endif
                  @endforeach
                  @foreach ($quartering as $qua)
                    @if ($qua->name == $item->id)
                        <strong style="color: darkcyan;">{{ $qua->quartering_name }}</strong> - <strong style="color: #dc3545;">{{ $booking->doctor_name }}</strong> <br>
                    @endif
                  @endforeach
                  @foreach ($physical_therapy as $therapy)
                    @if ($therapy->name == $item->id)
                        <strong style="color: darkcyan;">{{ $therapy->physical_therapy_name }}</strong> - <strong style="color: #dc3545;">{{ $booking->doctor_name }}</strong> <br>
                    @endif
                  @endforeach
                </td>
       
                

                <td>{{ $item->total_due }} دينار </td>
                <td>{{ $item->doctor_name }} </td>
                <td>{{ $item->created }} </td>
                <td>
                  <a href="booking.details/{{ $item->id }}">p</a>
                  <a href="diagnosing/{{ $item->members }}" class="btn btn-primary"> زيارة التشخيص </a>
                  <button data-invoice="{{ $item->id }}"  data-member="{{ $item->members }}" type="button" class="btn create_diagnosing btn-primary" data-bs-toggle="modal" data-bs-target="#singleModal">
                    تشخيص
                  </button>
                </td>
              </tr>
              
            @endforeach
        </tbody>
      </table>

</div>


<style>
.store_diagnosing .upload_diagnosing label {
    display: inline-block;
    border: 2px dashed;
    margin-top: 30px;
    display: block;
    text-align: center;
    padding: 20px 20px 10px 20px;
    background: aliceblue;
}

.store_diagnosing .upload_diagnosing input {
  display: none;
}
</style>



  <!-- Modal -->
  <div class="modal store_diagnosing fade" id="singleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
      <form action="{{ url("store.diagnosing") }}" method="POST" class="modal-content" enctype="multipart/form-data" >
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">  اضافة تشخيص   </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <input type="hidden" id="user_id" name="user_id" value="">
          <input type="hidden" id="invoice" name="invoice" value="">
          <div class="form-outline">
                <textarea name="text"  cols="30" rows="10" class="form-control"></textarea>
                <label class="form-label" for="form12"> التشخيص </label>
          </div>
          
          <div class="row upload_diagnosing">
            <div class="col-md-6">
              <label for="pictures">
                <p> رفع صور  </p>
                <input type="file" id="pictures" name="pictures[]"  multiple/>
              </label>
            </div>
            <div class="col-md-6">
              <label for="files">
                <p> رفع ملفات pdf , docx   </p>
                <input type="file" id="files"  name="files[]"  multiple/>/>
              </label>
            </div>
          </div>
            
        </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
              <button type="summit" class="btn btn-primary"> حفظ البيانات </button>
            </div>
          </form>
        </div>
      </div></div>









<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>


$(document).on("click", ".create_diagnosing", function(event) {
    event.preventDefault()
    var invoice = $(this).data("invoice");
    var member  = $(this).data("member");
    $("#user_id").val(member);
    $("#invoice").val(invoice);
});


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