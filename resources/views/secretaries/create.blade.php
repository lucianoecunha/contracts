@extends('layout')

@section('content')

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Secretarias</h3>
  </div>

  <div class="box-body">

    @if (count($errors) < 0)

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

   

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('secretaries.index') }}"> Back</a>

    </div>
  


    {!! Form::open(array('route' => 'secretaries.store','method'=>'POST')) !!}

    @include('secretaries.form')

    {!! Form::close() !!}

</div>

</div>





@endsection