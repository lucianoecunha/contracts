@extends('layout')


@section('content')

@if(isset($errors) && count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Setores</h3>
  </div>

  <div class="box-body">
    <div class="row">

        <div class="col-lg-12 margin-tb">

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('sectors.index') }}"> Back</a>

        </div>

        <div class="form-group">

            <strong>Nome:</strong>

            {{ $sector->name}}

        </div>

        <div class="form-group">

            <strong>Secretaria:</strong>
           
            {{  $sector->secretary->name}}


        </div>


    </div>

</div>



        
    </div>
    

</div>

@endsection