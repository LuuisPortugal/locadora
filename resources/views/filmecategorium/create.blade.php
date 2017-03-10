@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'filmecategorium.store', 'method' => 'post']) !!}
    @include('filmecategorium.partials.form', ['buttonText' => 'Create filmecategorium'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
