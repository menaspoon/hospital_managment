@extends('layouts.app')
@section('content')
<br><br><br><br><br>
<div class="invoice_detales">
    <div class="container">
        <div class="box_invoice_detales">
            <div class="row">
                <div class="col-md-6">
                    <div class="company_detales">
                        <div><i class="fal fa-phone"></i> {{  $companies->phone }} </div>
                        <div><i class="fal fa-envelope-open-text"></i> {{  $companies->email }} </div>
                        <div><i class="fas fa-map-marker-alt"></i> {{  $companies->location }} </div>
                    </div>
                </div> <!-- col-md-6 -->
                <div class="col-md-6">
                    <img src="{{ asset('/public/logo/'. $companies->logo) }}" alt="">
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
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->price * $item->count }} جنيــة</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- box_invoice_detales -->
    </div> <!-- container -->
</div> <!-- invoice_detales -->


@endsection