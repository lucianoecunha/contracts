@extends('layout')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Contratos</h3>
  </div>

  <div class="pull-right">

   <a class="btn btn-primary" href="{{ route('contracts.index') }}"> Back</a>

 </div>


 @if(isset($errors) && count($errors)>0)
 <div class="alert alert-danger">
  @foreach($errors->all() as $key => $value)
  <p>{{$value}}</p>
  @endforeach
</div>



@endif

@if(isset($contract))
<form class="form" method="post" action="{{route('contracts.update',$contract->id)}}">
  {!! method_field('PUT') !!}
  @else
  <form class="form" method="post" action="{{route('contracts.store')}}">
    @endif

    <form role="form">
      <div class="box-body">
        <input type="hidden" name='_token' value="{{csrf_token()}}">

        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}"> 
          <label for="year" class="col-lg-3 control-label">Ano</label> 


          <input id="year" type="text" class="form-control" name="year" value="{{ (old('year'))? old('year') : (($contract)? $contract->year : null) }}" placeholder="year"> 

          @if ($errors->has('contract')) 
          <span class="help-block"> 
            <strong>{{ $errors->first('contract') }}</strong> 
          </span> 
          @endif 
        </div> 
        

        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}"> 
          <label for="number" class="col-lg-3 control-label">Numero</label> 


          <input id="number" type="text" class="form-control" name="number" value="{{ (old('number'))? old('number') : (($contract)? $contract->number : null) }}" placeholder="number"> 


        </div> 


        <div class="form-group{{ $errors->has('parts') ? ' has-error' : '' }}"> 
          <label for="parts" class="col-lg-3 control-label">Partes</label> 


          <input id="parts" type="text" class="form-control" name="parts" value="{{ (old('parts'))? old('parts') : (($contract)? $contract->parts : null) }}" placeholder="parts"> 
        </div> 




        <div class="form-group{{ $errors->has('object') ? ' has-error' : '' }}"> 
          <label for="object" class="col-lg-3 control-label">Objeto</label> 


          <input id="object" type="text" class="form-control" name="object" value="{{ (old('object'))? old('object') : (($contract)? $contract->object : null) }}" placeholder="object">  

        </div> 

        <div class="form-group{{ $errors->has('kindofservice') ? ' has-error' : '' }}"> 
          <label for="kindofservice" class="col-lg-3 control-label">Tipo de Serviço</label> 


          <input id="kindofservice" type="text" class="form-control" name="kindofservice" value="{{ (old('kindofservice'))? old('kindofservice') : (($contract)? $contract->kindofservice : null) }}" placeholder="kindofservice">  

        </div> 

        <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}"> 
          <label for="source" class="col-lg-3 control-label">Origem</label> 


          <input id="source" type="text" class="form-control" name="source" value="{{ (old('source'))? old('source') : (($contract)? $contract->source : null) }}" placeholder="source">  

        </div>

        <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }}"> 
          <label for="signature" class="col-lg-3 control-label">Assinatura</label> 


          <input id="signature" type="text" class="form-control" id="datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="signature" value="{{ (old('signature'))? old('signature') : (($contract)?   date('d/m/Y', strtotime($contract->signature)) : null) }}" placeholder="signature">  

        </div>

        <div class="form-group{{ $errors->has('validity') ? ' has-error' : '' }}"> 
          <label for="validity" class="col-lg-3 control-label">Validade</label> 


          <input id="validity" type="text" class="form-control" id="datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="validity" value="{{ (old('validity'))? old('validity') : (($contract)?   date('d/m/Y', strtotime($contract->validity)) : null) }}" placeholder="validity">  

        </div> 

        <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}"> 
          <label for="source" class="col-lg-3 control-label">Valor</label> 


          <input id="value" type="text" class="form-control" name="value" value="{{ (old('value'))? old('value') : (($contract)? $contract->value : null) }}" placeholder="source">  

        </div>                

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>

        </div>

      </div>
    </form>
  </form>

</div> 


<!-- /.Add Managers-->

<div class="box box-primary">
 <div class="box-header with-border">
  <h3 class="box-title">Adicionar Gestores</h3>
</div>
<form role="form" method="POST" action="{{ route('contracts.add_contract_manager') }}">

  <input type="hidden" name="id" id="id" value="{{ $contract->id }}">
  {{ csrf_field() }}


  <div class="form-group" >


    <select id="manager_id" name="manager_id" class="form-control" placeholder="Gestores"> 

      <option value="">Selecione</option> 
      @foreach ($managers as $manager) 

      <option value="{{$manager->id}}" {{ (intval(old('manager')) === intval($manager->id))? 'selected' : null }}>{{ $manager->name }}</option> 

      @endforeach 
    </select> 

  </div>

  <div class="box-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>

  </div>

</form>
</div>

<!-- /.managers lists -->

<div class="box box-primary">
 <div class="box-header with-border">
  <h3 class="box-title">Gestores do  Gestores</h3>
</div>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Nome</th>
      @if (!$managers)
      <th>Ações</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @if (isset($managers) && $managers->count() > 0)
    @foreach ($contract->managers as $man)
    <tr>
      <td>{{ $man->name }}</td>

      @if ($managers->count()>0)
      <td>
        <form role="form" method="POST" action="{{ route('contracts.remove_contract_manager') }}">
          {{ csrf_field() }}
          <input type="hidden" name="manager_id" id="manager_id" value="{{ $man->id }}">
          <input type="hidden" name="id" id="id" value="{{ $contract->id }}">
          <button type="submit" class="btn btn-block btn-danger a="fa-trash">
            <i class="fa fa-trash">Remover</i>
          </button>
        </form>
      </td>
      @endif
    </tr>
    @endforeach
    @else
    <tr>
      <td colspan="5"> Nenhum registro encontrado... </td>
    </tr>
    @endif
  </tbody>
</table>

</div>



@endsection
