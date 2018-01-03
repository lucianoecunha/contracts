@extends('layout')

@section('content')
<h1 class="title-pg">Cadastro de Gestores</h1>
@if(isset($errors) && count($errors)>0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>

@endif

@if(isset($manager))
<form class="form" method="post" action="{{route('managers.update',$manager->id)}}">
    {!! method_field('PUT') !!}
    @else
    <form class="form" method="post" action="{{route('managers.store')}}">
        @endif


        <input type="hidden" name='_token' value="{{csrf_token()}}">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"> 
                <label for="name" class="col-lg-3 control-label">Nome</label> 


                <input id="name" type="text" class="form-control" name="name" value="{{ (old('name'))? old('name') : (($managers)? $manager->name : null) }}" placeholder="Nome"> 

                @if ($errors->has('manager')) 
                <span class="help-block"> 
                    <strong>{{ $errors->first('manager') }}</strong> 
                </span> 
                @endif 

            </div>


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"> 
                <label for="email" class="col-lg-3 control-label">Email</label> 


                <input id="email" type="text" class="form-control" name="email" value="{{ (old('email'))? old('email') : (($managers)? $manager->email : null) }}" placeholder="Email"> 

                @if ($errors->has('managers')) 
                <span class="help-block"> 
                    <strong>{{ $errors->first('managers') }}</strong> 
                </span> 
                @endif 

            </div> 

            <div class="form-group" >

                <select id="sector_id" name="sector_id" class="form-control" placeholder="Setor"> 
                 <label for="sector_id" class="col-lg-3 control-label">Setor</label>
                 <option value="">Selecione</option> 
                 @foreach ($sectors as $sector) 
                 <option value="{{ $sector->id }}" {{ ($managers && $manager->sector_id === $sector->id)? 'selected' : null }}>{{ $sector->name }}</option> 
                 @endforeach 
             </select> 



         </div>



         <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>




    </form>
    @endsection
