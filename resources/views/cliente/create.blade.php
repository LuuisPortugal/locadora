@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'cliente.store', 'method' => 'post']) !!}
    @include('cliente.partials.form', ['buttonText' => 'Create cliente'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
