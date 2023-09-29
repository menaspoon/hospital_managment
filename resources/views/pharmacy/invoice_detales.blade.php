@extends('master')
@section('content')

<style>


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
                    <img src="{{ asset('/public/hospital/'. $hospital->logo) }}" alt="">
                </div> <!-- col-md-6 logo -->
            </div> <!-- row -->
            <h2>فاتورة مشتريات</h2>
            <div class="row">
                <div class="col-md-2">
                    <span> المورد </span> <br>
                    <strong> احمد السيد حسين </strong>
                </div> <!-- col-md-2 -->
                <div class="col-md-2">
                    <span> الاجمالي </span> <br>
                    <strong> {{  $purchases->total_due }} جنيــة </strong>
                </div> <!-- col-md-2 -->
                <div class="col-md-2">
                    <span> تاريخ انشاء الفاتورة </span> <br>
                    <strong> {{  $purchases->created }}  </strong>
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
            </div> <!-- row -->
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الصتف</th>
                        <th>العدد</th>
                        <th>السعر</th>
                        <th>الاجمالي</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($invoice_detales as $item)
                    <tr>
                        <td>{{ $id++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->count }}</td>
                        <td>{{ $item->price }} دينار </td>
                        <td>{{ $item->price * $item->count }} دينار </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- box_invoice_detales -->
    </div> <!-- container -->
</div> <!-- invoice_detales -->


@endsection