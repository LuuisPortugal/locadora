@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'loja.store', 'method' => 'post']) !!}
    @include('loja.partials.form', ['buttonText' => 'Create loja'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
