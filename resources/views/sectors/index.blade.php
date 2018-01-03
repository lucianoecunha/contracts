@extends('layout')

@section('content')

 <div class="box">
    <div class="box-header">
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Setores</h3>
  </div>

  <div class="box-body">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('sectors.create') }}"> Create New Sector</a>

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered table-striped">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Secretary</th>

            <th width="280px">Action</th>

        </tr>


    @foreach ($sectors as $sector)

    <tr>
        <td>{{ ++$i }}</td>
        
        <td>{{ $sector->name}}</td>        

        <td>{{$sector->secretary->name}}</td>


        <td>
            <a class="btn btn-info" href="{{ route('sectors.show',$sector->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('sectors.edit',$sector->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['sectors.destroy', $sector->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

    </table>

</div>


    

@endsection