@extends('layout')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastro de Contratos</h3>
  </div>
  @if(isset($errors) && count($errors)>0)
  <div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
  </div>

  @endif

  @if(isset($contract))
  <form class="form" method="post" action="{{route('contracts.update',$contract->id)}}">
    {!! method_field('PUT') !!}
    @else
    <form class="form" method="post" action="{{route('contracts.store')}}">
      @endif


      <input type="hidden" name='_token' value="{{csrf_token()}}">

      <form role="form">
        <div class="box-body">
          <div class="row">


          <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}"> 
            <label for="name" class="col-lg-4 control-label">Ano</label> 

            <input id="year" type="text" class="form-control" name="year" value="{{ (old('year'))? old('year') : (($contracts)? $contract->year : null) }}" placeholder="year"> 

            @if ($errors->has('manager')) 
            <span class="help-block"> 
              <strong>{{ $errors->first('manager') }}</strong> 
            </span> 
            @endif 

          </div>

          <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}"> 
            <label for="number" class="col-lg-4 control-label">Numero</label> 


            <input id="number" type="text" class="form-control" name="number" value="{{ (old('number'))? old('number') : (($contracts)? $contract->number : null) }}" placeholder="number"> 

            @if ($errors->has('managers')) 
            <span class="help-block"> 
              <strong>{{ $errors->first('managers') }}</strong> 
            </span> 
            @endif 

          </div> 

        </div>

          <div class="form-group{{ $errors->has('parts') ? ' has-error' : '' }}"> 
            <label for="parts" class="col-lg-3 control-label">Partes</label> 

            <input id="parts" type="text" class="form-control" name="parts" value="{{ (old('parts'))? old('parts') : (($contracts)? $contract->parts : null) }}" placeholder="parts"> 

            @if ($errors->has('managers')) 
            <span class="help-block"> 
              <strong>{{ $errors->first('managers') }}</strong> 
            </span> 
            @endif 

          </div> 

          <div class="form-group{{ $errors->has('object') ? ' has-error' : '' }}"> 
            <label for="object" class="col-lg-3 control-label">Objeto</label> 


            <input id="object" type="text" class="form-control" name="object" value="{{ (old('object'))? old('object') : (($contracts)? $contract->object : null) }}" placeholder="object"> 

            @if ($errors->has('managers')) 
            <span class="help-block"> 
              <strong>{{ $errors->first('managers') }}</strong> 
            </span> 
            @endif 

          </div> 

          <div class="form-group{{ $errors->has('kindofservice') ? ' has-error' : '' }}"> 
            <label for="kindofservice" class="col-lg-3 control-label">Tipo de Serviço</label> 

            <input id="kindofservice" type="text" class="form-control" name="kindofservice" value="{{ (old('kindofservice'))? old('kindofservice') : (($contracts)? $contract->kindofservice : null) }}" placeholder="kindofservice"> 

            @if ($errors->has('managers')) 
            <span class="help-block"> 
              <strong>{{ $errors->first('managers') }}</strong> 
            </span> 
            @endif 

          </div> 

          <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}"> 
            <label for="source" class="col-lg-3 control-label">Origem</label> 


            <input id="source" type="text" class="form-control" name="source" value="{{ (old('source'))? old('source') : (($contracts)? $contract->source : null) }}" placeholder="source"> 

            @if ($errors->has('contracts')) 
            <span class="help-block"> 
              <strong>{{ $errors->first('contracts') }}</strong> 
            </span> 
            @endif 

          </div> 

          <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }}"> 
            <label for="signature" class="col-lg-3 control-label">Assinatura</label> 

            <input id="signature" type="text" class="form-control" name="signature" value="{{ (old('signature'))? old('signature') : (($contracts)? $contract->signature : null) }}" placeholder="signature"> 

            @if ($errors->has('managers')) 
            <span class="help-block"> 
              <strong>{{ $errors->first('managers') }}</strong> 
            </span> 
            @endif 

          </div> 

          <div class="form-group{{ $errors->has('validity') ? ' has-error' : '' }}"> 
            <label for="validity" class="col-lg-3 control-label">Validade</label> 

            <input id="validity" type="text" class="form-control" name="validity" value="{{ (old('validity'))? old('validity') : (($contracts)? $contract->validity : null) }}" placeholder="validity"> 

            @if ($errors->has('contracts')) 
            <span class="help-block"> 
              <strong>{{ $errors->first('contracts') }}</strong> 
            </span> 
            @endif 

          </div> 

          <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}"> 
            <label for="value" class="col-lg-3 control-label">Valor</label> 

            <input id="value" type="text" class="form-control" name="value" value="{{ (old('value'))? old('value') : (($contracts)? $contract->value : null) }}" placeholder="value"> 

            @if ($errors->has('contracts')) 
            <span class="help-block"> 
              <strong>{{ $errors->first('contracts') }}</strong> 
            </span> 
            @endif 

          </div> 

          <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

          </div>

        </form>

      </div>

        @endsection
