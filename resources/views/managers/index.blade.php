@extends('layout')

@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Gestores</h3>
  </div>

  <div class="box-body">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('managers.create') }}"> Create New Manager</a>

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

    @endif


    <table class="table table-bordered table-striped" id="exp1" >
      <thead>
        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Email</th>

            <th>Setor</th>

            <th width="280px">Action</th>

        </tr>
    </thead>

    @foreach ($managers as $manager)

    <tr>
        <td>{{ ++$i }}</td>
        
        <td>{{ $manager->name}}</td>  

        <td>{{ $manager->email}}</td>       

        <td>{{$manager->sector->name}}</td>


        <td>
            <a class="btn btn-info" href="{{ route('managers.show',$manager->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('managers.edit',$manager->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['managers.destroy', $manager->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

</table>

</div>
</div>  

@endsection

@push('scripts')

<script type="text/javascript">
   $(function () {
     $('#exp1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
  })

 })

@endpush

