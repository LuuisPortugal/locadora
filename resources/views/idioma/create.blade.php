@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'idioma.store', 'method' => 'post']) !!}
    @include('idioma.partials.form', ['buttonText' => 'Create idioma'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
