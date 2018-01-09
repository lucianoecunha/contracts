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

  <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">
               <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}"> 
                <label for="year" control-label">Ano</label> 


                <input id="year" type="text" class="form-control" name="year" value="{{ (old('year'))? old('year') : (($contracts)? $contract->year : null) }}" placeholder="year"> 

                @if ($errors->has('contract')) 
                <span class="help-block"> 
                  <strong>{{ $errors->first('contract') }}</strong> 
                </span> 
                @endif 
              </div> 

            </div>
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}"> 
                <label for="number" control-label">Numero</label> 


                <input id="number" type="text" class="form-control" name="number" value="{{ (old('number'))? old('number') : (($contracts)? $contract->number : null) }}" placeholder="number"> 
              </div> 

            </div>
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('notify') ? ' has-error' : '' }}">
                <label for="notify" class="control-label">Notifica?</label>
                <select id="notify" name="notify" class="form-control" > 
                  <option value="">Selecione</option> 
                  <option value="0" >Não</option> 
                  <option value="1" >Sim</option> 
                </select>
              </div>
            </div>
            

          </div>
          <div class="row">
            <div class="col-md-12">
             <div class="form-group{{ $errors->has('parts') ? ' has-error' : '' }}"> 
              <label for="parts" control-label">Partes</label> 


              <input id="parts" type="text" class="form-control" name="parts" value="{{ (old('parts'))? old('parts') : (($contracts)? $contract->parts : null) }}" placeholder="parts"> 
            </div> 

          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
           <div class="form-group{{ $errors->has('object') ? ' has-error' : '' }}"> 
            <label for="object" control-label">Objeto</label> 


            <input id="object" type="text" class="form-control" name="object" value="{{ (old('object'))? old('object') : (($contracts)? $contract->object : null) }}" placeholder="object">  

          </div> 
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('kindofservice') ? ' has-error' : '' }}"> 
            <label for="kindofservice" control-label">Tipo de Serviço</label> 


            <input id="kindofservice" type="text" class="form-control" name="kindofservice" value="{{ (old('kindofservice'))? old('kindofservice') : (($contracts)? $contract->kindofservice : null) }}" placeholder="kindofservice">  

          </div> 
        </div>
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}"> 
            <label for="source"  control-label">Origem</label> 
            <input id="source" type="text" class="form-control" name="source" value="{{ (old('source'))? old('source') : (($contracts)? $contract->source : null) }}" placeholder="source">  

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group{{ $errors->has('signature') ? ' has-error' : '' }}"> 
            <label for="signature" control-label">Assinatura</label> 


            <input id="signature" type="text" class="form-control" id="datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="signature" value="{{ (old('signature'))? old('signature') : (($contracts)? date('d/m/Y', strtotime($contract->signature)) : null) }}" placeholder="signature">  

          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group{{ $errors->has('validity') ? ' has-error' : '' }}"> 
            <label for="validity" control-label">Validade</label> 


            <input id="validity" type="text" class="form-control" id="datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name="validity" value="{{ (old('validity'))? old('validity') : (($contracts)?   date('d/m/Y', strtotime($contract->validity)) : null) }}" placeholder="validity">  

          </div> 
        </div>
        <div class="col-md-4">
          <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}"> 
            <label for="source" class="col-lg-3 control-label">Valor</label> 


            <input id="value" type="text" class="form-control" name="value" value="{{ (old('value'))? old('value') : (($contracts)?  money_format('%n',$contract->value) : null) }}" placeholder="source">  

          </div>      
        </div>
      </div>
      
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a class="btn btn-primary" href="{{ route('contracts.index') }}"> Back</a>

    </div>
    

  </div>
</form>
</form>

</div> 
     @endsection