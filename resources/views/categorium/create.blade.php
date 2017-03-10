@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'categorium.store', 'method' => 'post']) !!}
    @include('categorium.partials.form', ['buttonText' => 'Create categorium'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
