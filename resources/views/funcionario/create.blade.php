@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'funcionario.store', 'method' => 'post']) !!}
    @include('funcionario.partials.form', ['buttonText' => 'Create funcionario'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
