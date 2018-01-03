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
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Contratos</h3>
  </div>
  <div class="box-body">
    <div class="row">

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('contracts.edit',$contract->id) }}">Edit</a>

            <a class="btn btn-primary" href="{{ route('contracts.index') }}"> Back</a>

        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Ano:</strong>

                {{ $contract->year}}

            </div>

            <div class="form-group">

                <strong>Numero:</strong>

                {{ $contract->number}}

            </div>

            <div class="form-group">

                <strong>Partes:</strong>

                {{ $contract->parts}}

            </div>

            <div class="form-group">

                <strong>Objeto:</strong>

                {{ $contract->object}}

            </div>

            <div class="form-group">

                <strong>Serviço:</strong>

                {{ $contract->kindofservice}}

            </div>

            <div class="form-group">

                <strong>Origem:</strong>

                {{ $contract->source}}

            </div>

            <div class="form-group">

                <strong>Assinatura:</strong>

                {{ ($contract->signature)? date('d/m/Y', strtotime($contract->signature)) : '' }}
            

            </div>

            <div class="form-group">

                <strong>Validade:</strong>
                {{ ($contract->validity)? date('d/m/Y', strtotime($contract->validity)) : '' }}

               

            </div>

            <div class="form-group">

                <strong>Valor:</strong>

                {{ $contract->value}}

            </div>

            <div class="form-group">

                <strong>Gestor (es):</strong> <br>
                @foreach ($contract->managers as $manager)

                {{$manager->name}} <br>

                @endforeach




            </div>

             <div class="form-group">

                <strong>Setor (es):</strong> <br>
                @foreach ($contract->sectors as $sector)

                {{$sector->name}} <br>

                @endforeach




            </div>


        </div>

    </div>

</div>





</div>


@endsection