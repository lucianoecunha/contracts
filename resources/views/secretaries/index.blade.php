@extends('layout')

@section('content')

 <div class="box">
    <div class="box-header">
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Secretarias</h3>
  </div>

  <div class="box-body">
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('secretaries.create') }}"> Create New Secretary</a>

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

            <th width="280px">Action</th>

        </tr>

    @foreach ($secretaries as $Secretary)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $Secretary->name}}</td>

        <td>

            <a class="btn btn-info" href="{{ route('secretaries.show',$Secretary->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('secretaries.edit',$Secretary->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['secretaries.destroy', $Secretary->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

    </table>


    {!! $secretaries->links() !!}

@endsection

</div>
</div>