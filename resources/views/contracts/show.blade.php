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



    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
         <strong>Ano:</strong>
         {{ $contract->year}}
       </div>
       <div class="col-md-4">
         <strong>Numero:</strong>
         {{ $contract->number}}
       </div>

       <div class="col-md-4">
         <strong>Notificar:</strong>
         @if($contract->notify == 1) Sim
         @else Não
         @endif                 
       </div>
     </div>
     <div class="row">
      <div class="col-md-12">
       <strong>Partes:</strong>

       {{ $contract->parts}}

     </div>
   </div>
   <div class="row">
    <div class="col-md-12">
      <strong>Objeto:</strong>

      {{ $contract->object}}

    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
     <strong>Serviço:</strong>

     {{ $contract->kindofservice}}
   </div>
   <div class="col-md-6">
    <strong>Origem:</strong>

    {{ $contract->source}}
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <strong>Assinatura:</strong>

    {{ ($contract->signature)? date('d/m/Y', strtotime($contract->signature)) : '' }}
  </div>
  <div class="col-md-4">
    <strong>Validade:</strong>
    {{ ($contract->validity)? date('d/m/Y', strtotime($contract->validity)) : '' }}    
  </div>
  <div class="col-md-4">
    <strong>Valor:</strong>
    {{ money_format('%n', $contract->value)}}
    
  </div>
</div>

<div class="row">
  <div class="col-md-12">
   <strong>Gestor (es):</strong> <br>
   @foreach ($contract->managers as $manager)

   {{$manager->name}} <br>

   @endforeach
 </div>
</div>

<div class="row">
  <div class="col-md-12">
    <strong>Setor (es):</strong> <br>
    @foreach ($contract->sectors as $sector)

    {{$sector->name}} <br>

    @endforeach
  </div>
</div>
</div>

</div>

</div>
<div class="box-footer">

  <a class="btn btn-primary" href="{{ route('contracts.edit',$contract->id) }}">Edit</a>

  <a class="btn btn-primary" href="{{ route('contracts.index') }}"> Back</a>        

</div>

@endsection