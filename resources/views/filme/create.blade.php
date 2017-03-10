@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'filme.store', 'method' => 'post']) !!}
    @include('filme.partials.form', ['buttonText' => 'Create filme'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
