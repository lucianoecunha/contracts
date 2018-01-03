@extends('layout')


@section('content')

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Gestores</h3>
  </div>

  <div class="box-body">
    @if(isset($errors) && count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>
    @endif


    <div class="col-lg-12 margin-tb">

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('managers.index') }}"> Back</a>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>Nome:</strong>

            {{ $manager->name}}

        </div>

        <div class="form-group">

            <strong>Email:</strong>

            {{ $manager->email}}

        </div>

        <div class="form-group">

            <strong>Setor:</strong>
            
            {{  $manager->sector->name}}


        </div>

    </div>
    

</div>
</div>

@endsection