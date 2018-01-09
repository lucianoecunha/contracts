@extends('layout')

@section('content')

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Contratos</h3>
  </div>
  <div class="box-body">
    

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('contracts.create') }}"> Create New Contract</a> 

            </div>

        </div>

        <br>

  


    @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

    @endif

    <table class="table table-bordered table-striped" id="contracts-table" >
      <thead>

        <tr>
             <th>ID</th>

            <th>Ano</th>

            <th>Numero</th>

            <th>Objeto</th>

            <th>Partes</th>

            <th>Validade</th>

            <th>Ação</th>


        </tr>
    </thead>

   </table>
</div>
</div>



@endsection


<script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
<script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
<script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
<script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
<script src="https://datatables.yajrabox.com/js/handlebars.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.0.0/jquery.mark.min.js"></script>

<script type="text/javascript">
     $(function() {
        $('#contracts-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'http://desenv.intra/contracts/get_datatable',
            columns: [
            {data: 'id'},
            {data: 'year'},
            {data: 'number'},
            {data: 'object'},
            {data: 'parts'},
            {data: 'validity'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
            
        ]
        });
    });
</script>