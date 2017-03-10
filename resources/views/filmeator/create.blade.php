@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'filmeator.store', 'method' => 'post']) !!}
    @include('filmeator.partials.form', ['buttonText' => 'Create filmeator'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
