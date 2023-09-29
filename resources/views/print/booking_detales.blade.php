@extends('master')
@section('content')
<br><br><br><br><br>

 
<style>
.invoice_detales .box_invoice_detales .thead_tr {
    color: #00b74a;
    border-bottom: 1px solid #00b74a;
    font-weight: bold;
    background: aliceblue;
}

/*----------------------- invoice_detales ------------------*/
/*----------------------- invoice_detales ------------------*/

.invoice_detales .box_invoice_detales {
    background-color: #fff;
    padding: 50px;
    box-shadow: 0px 0px 17px 0px #cccccc6b;
}

.invoice_detales .box_invoice_detales img {
    width: 150px;
    margin-bottom: 50px;
    float: left;
}

.company_detales div {
    /* font-weight: bold; */
    margin-bottom: 8px;
}

.company_detales div i {
    color: #00b74a9c;
    margin-left: 10px;
    font-size: 20px;
}

.invoice_detales h2 {
    color: #000;
    margin-bottom: 30px;
}

.invoice_detales .box_invoice_detales table {
    margin-top: 50px;
}

.invoice_detales .box_invoice_detales thead tr {
    color: #00b74a;
    border-bottom: 1px solid #00b74a;
    font-weight: bold;
}

.table .hide-tr tr td, .table  .hide-tr tr th {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 0px solid #dee2e6;
}
</style>


<div class="invoice_detales">
    <div class="container">
        <div class="box_invoice_detales">
            <div class="row">
                <div class="col-md-6">
                    <div class="company_detales">
                        <div><i class="fal fa-phone"></i> {{  $hospital->phone }} </div>
                        <div><i class="fal fa-envelope-open-text"></i> {{  $hospital->email }} </div>
                        <div><i class="fas fa-map-marker-alt"></i> {{  $hospital->address }} </div>
                    </div>
                </div> <!-- col-md-6 -->
                <div class="col-md-6">
                    <img src="{{ asset('/public/logo/'. $hospital->logo) }}" alt="">
                </div> <!-- col-md-6 logo -->
            </div> <!-- row -->
            <h2>فاتورة مشتريات</h2>
            <div class="row">
                <div class="col-md-2">
                    <span> المورد </span> <br>
                    <strong> احمد السيد حسين </strong>
                </div> <!-- col-md-2 -->
                {{--
                <div class="col-md-2">
                    <span> الاجمالي </span> <br>
                    <strong> {{  $purchases->total_due }} جنيــة </strong>
                </div> <!-- col-md-2 -->
                <div class="col-md-2">
                    <span> تاريخ انشاء الفاتورة </span> <br>
                    <strong> {{  $purchases->date }}  </strong>
                </div> <!-- col-md-2 -->
                <div class="col-md-2">
                    <span> نوع العملية </span> <br>
                    <strong> {{  $purchases->operation_type }}  </strong>
                </div> <!-- col-md-2 -->
                @if ($purchases->discount != "")
                <div class="col-md-2">
                    <span> الخصم </span> <br>
                    <strong> {{  $purchases->discount }}  </strong>
                </div> <!-- col-md-2 -->
                @endif
                --}}
            </div> <!-- row -->
            <table class="table">

                <tbody>
                    <?php $id = 1; ?>
                    @if ($MedicalExaminationBooking)
                        <div class="hide-tr"><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></div>
                        <tr class="thead_tr">
                            <th>#</th>
                            <th>الفحص</th>
                            <th>الدكتور</th>
                            <th>السعر</th>
                        </tr>
                        @foreach ($MedicalExaminationBooking as $item)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $item->medical_examination_name }}</td>
                                <td>{{ $item->doctor_name }}</td>
                                <td>{{ $item->price }} دينار </td>
                            </tr>
                        @endforeach
                    @endif
                    @if ($analytics)
                        <div class="hide-tr"><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></div>
                        <tr class="thead_tr">
                            <th>#</th>
                            <th>التحليل</th>
                            <th>الدكتور</th>
                            <th>السعر</th>
                        </tr>
                        @foreach ($analytics as $item)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $item->analytics_name }}</td>
                                <td>{{ $item->doctor_name }}</td>
                                <td>{{ $item->price }} دينار </td>
                            </tr>
                        @endforeach
                    @endif

                    @if ($rayBooking)
                        <div class="hide-tr"><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></div>
                        <tr class="thead_tr">
                            <th>#</th>
                            <th>اسم الاشعــــــة</th>
                            <th>الدكتور</th>
                            <th>السعر</th>
                        </tr>
                        @foreach ($rayBooking as $item)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $item->ray_name }}</td>
                                <td>{{ $item->doctor_name }}</td>
                                <td>{{ $item->price }} دينار </td>
                            </tr>
                        @endforeach
                    @endif

                    

                    @if ($surgery)
                        <div class="hide-tr"><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></div>
                        <tr class="thead_tr">
                            <th>#</th>
                            <th>اسم العملية</th>
                            <th>الدكتور</th>
                            <th>السعر</th>
                        </tr>
                        @foreach ($surgery as $item)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $item->surgery_name }}</td>
                                <td>{{ $item->doctor_name }}</td>
                                <td>{{ $item->price }} دينار </td>
                            </tr>
                        @endforeach
                    @endif

                    @if ($physical_therapy)
                    <div class="hide-tr"><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></div>
                    <tr class="thead_tr">
                            <th>#</th>
                            <th>العلاج الطبيعي</th>
                            <th>الدكتور</th>
                            <th>السعر</th>
                        </tr>
                        @foreach ($physical_therapy as $item)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $item->physical_therapy_name }}</td>
                                <td>{{ $item->doctor_name }}</td>
                                <td>{{ $item->price }} دينار </td>
                            </tr>
                        @endforeach
                    @endif
                    


                    @if ($quartering)
                    <div class="hide-tr"><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></div>
                    <tr class="thead_tr">
                            <th>#</th>
                            <th>الايواء</th>
                            <th>الدكتور</th>
                            <th>السعر</th>
                        </tr>
                        @foreach ($quartering as $item)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $item->quartering_name }}</td>
                                <td>{{ $item->doctor_name }}</td>
                                <td>{{ $item->price }} دينار </td>
                            </tr>
                        @endforeach
                    @endif

                    @if ($intensive_care)
                    <div class="hide-tr"><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr></div>
                    <tr class="thead_tr">
                            <th>#</th>
                            <th>العناية المركزة</th>
                            <th>الدكتور</th>
                            <th>السعر</th>
                        </tr>
                        @foreach ($intensive_care as $item)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $item->intensive_care_name }}</td>
                                <td>{{ $item->doctor_name }}</td>
                                <td>{{ $item->price }} دينار </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div> <!-- box_invoice_detales -->
    </div> <!-- container -->
</div> <!-- invoice_detales -->


@endsection