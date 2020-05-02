@extends('layouts.app')

@section('contents')

   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>



    <div class="container">
            <table id="myTable" class="data-table">
        <thead>
          <tr>
              <th>ID </th>
              <th>Order Status</th>
              <th>Order ID </th>
              <th>Item Price</th>
          </tr>
        </thead>

        <tbody>

        </tbody>
      </table>
    </div>

      <script type="text/javascript">
        $(function () {
          
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('orders/lists/fors/admins') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'oname', name: 'oname'},
                  {data: 'oid', name: 'oid'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
          
  });
</script>
    
@endsection

