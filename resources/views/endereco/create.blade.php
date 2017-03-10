@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'endereco.store', 'method' => 'post']) !!}
    @include('endereco.partials.form', ['buttonText' => 'Create endereco'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
