@extends('master')
@section('content')
<br><br><br>
<div>
  <div class="container">
<style>
  svg { display: none !important;}
  table tr td {font-weight: 900}
</style>

    <div class="row">
      <div class="col-md-3">
        <h2>  فواتير المشتريات </h2>
      </div>
      <div class="col-md-5">
        <div class="form-outline">
            <input type="text" id="serach_purchases"  data-route="search.purchases" class="form-control form-control-lg">
            <label class="form-label" for="formControlLg" style="margin-left: 0px;">  بحث عن عميل </label>
        <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 170.4px;"></div><div class="form-notch-trailing"></div></div></div>
        <br>
      </div>
      <div class="col-md-2">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        
          <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-new" data-mdb-toggle="dropdown" aria-expanded="false">
              تنزيل  فواتير المشتريات  
            </button>
            <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <li><a class="dropdown-item" href="export.purchases.xlsx"> تنزيل نسحة Excel </a></li>
              <li><a class="dropdown-item" href="export.purchases.csv"> تنزيل نسحة Excel Csv </a></li>
              <li><a class="dropdown-item" href="export.purchases.pdf"> تنزيل نسحة PDF </a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <a  href="create.purchases.tools" class="btn btn-primary btn-new"> فاتورة جديد </a>
      </div>
    </div>

    <br><br><br>



    

    <div class="box-table">
      <table class="table border">
        <thead>
          <tr class="parent">
            <th scope="col">#</th>
            <th scope="col"> المورد </th>
            <th scope="col"> نوع العملية  </th>
            <th scope="col"> المدفوع   </th>
            <th scope="col"> المتبقي   </th>
            <th scope="col"> الخصم </th>
            <th scope="col"> اجمالي المبلغ </th>
            <th scope="col">  التخزين </th>
            <th scope="col">  تفاصيل الفاتورة </th>
            <th scope="col">  لوحة التحكم </th>
          </tr>
        </thead>
        <tbody > 
          <?php $id = 1 ?>
          @foreach ($data as $item)
           <tr>
              <td>{{ $id++ }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->operation_type }}</td>
              <td>{{ $item->paid_up }} جنية</td>
              <td> {{ (int)$item->total_due - (int)$item->paid_up }} جنية</td>
              <td>{{ $item->discount }}</td>
              <td>{{ $item->total_due }} دينار </td>
              <td>{{ $item->storage }} دينار </td>
              <td> <a href="/hospital/details.purchases.tools/{{ $item->id }}">تفاصيل الفاتورة</a> </td>


              <td>
                <a href="#" data-id="{{ $item->id }}" class="btn-action edit_clint_markting actions"  data-toggle="modal" data-target="#EditModal"> <i class="fas fa-pencil-alt"></i> </a>
                <a href="#" data-id="{{ $item->id }}"  class="btn-action btn-delete delete actions"> <i class="far fa-trash-alt"></i> </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $data->links() }}

    </div>

  </div>
</div>










@endsection
