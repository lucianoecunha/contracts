@extends('layout')


@section('content')

<div class="box">
    <div class="box-header">
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Secretarias</h3>
  </div>

  <div class="box-body">
    

    <div class="pull-right">

        <a class="btn btn-primary" href="{{ route('secretaries.index') }}"> Back</a>

    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Nome:</strong>

                {{ $secretary->name}}

            </div>

        </div>
        

    </div>
</div>
</div>
@endsection


