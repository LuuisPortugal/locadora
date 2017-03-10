@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'cidade.store', 'method' => 'post']) !!}
    @include('cidade.partials.form', ['buttonText' => 'Create cidade'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
