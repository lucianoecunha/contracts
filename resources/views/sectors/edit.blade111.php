@extends('layout')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Edit Sector</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('sectors.index') }}"> Back</a>

        </div>

    </div>

</div>


@if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<form class="form-horizontal" role="form" method="POST" action="{{ route('sectors.update', $sector->id) }}">
    {{ csrf_field() }}

    @include('sectors.form')

    {!! Form::close() !!}


    @endsection