@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'pai.store', 'method' => 'post']) !!}
    @include('pai.partials.form', ['buttonText' => 'Create pai'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
