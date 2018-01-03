@extends('layout')

@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Gerenciamento de Contratos  - Cadastro de Setores</h3>
  </div>

  <div class="box-body">


    @if(isset($errors) && count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
    </div>

    @endif

    @if(isset($sector))

    <form class="form" method="post" action="{{route('sectors.update',$sector->id)}}">
        {!! method_field('PUT') !!}
        
    @else
        
        <form class="form" method="post" action="{{route('sectors.store')}}">
           
    @endif

            <input type="hidden" name='_token' value="{{csrf_token()}}">


              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
                <label for="name" class="col-lg-3 control-label">Nome</label> 


                <input id="name" type="text" class="form-control" name="name" value="{{ (old('name'))? old('name') : (($sector)? $sector->name : null) }}" placeholder="Nome"> 

                @if ($errors->has('sector')) 
                <span class="help-block"> 
                    <strong>{{ $errors->first('sector') }}</strong> 
                </span> 
                @endif 
            </div> 


            <div class="form-group" >

                <select id="secretary_id" name="secretary_id" class="form-control" placeholder="Secretaria"> 

                    <option value="">Selecione</option> 
                    @foreach ($secretaries as $secretary) 
                    <option value="{{ $secretary->id }}" {{ ($sector && $sector->secretary_id === $secretary->id)? 'selected' : null }}>{{ $secretary->name }}</option> 
                    @endforeach 
                </select> 

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

       






    </form>

</div>

@endsection

</div>