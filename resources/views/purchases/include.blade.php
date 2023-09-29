
          <?php $id = 1 ?>
          @foreach ($purchases as $item)
           <tr>
              <td>{{ $id++ }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->operation_type }}</td>
              <td>{{ $item->paid_up }} جنية</td>
              <td> {{ (int)$item->total_due - (int)$item->paid_up }} جنية</td>
              <td>{{ $item->discount }}</td>
              <td>{{ $item->total_due }} جنية</td>
              <td> <a href="/erp/invoice.detales/{{ $item->id }}">تفاصيل الفاتورة</a> </td>


              <td>
                <a href="#" data-id="{{ $item->id }}" class="btn-action edit_clint_markting"  data-toggle="modal" data-target="#EditModal"> <i class="fas fa-pencil-alt"></i> </a>
                <a href="#" data-id="{{ $item->id }}" data-table="invoice" data-route="delete.purchases"  class="btn-action btn-delete"> <i class="far fa-trash-alt"></i> </a>
              </td>
            </tr>
          @endforeach
