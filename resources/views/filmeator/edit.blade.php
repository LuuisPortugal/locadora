@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['filmeator.update', $filmeator->id], 'method' => 'post']) !!}
    @include('filmeator.partials.form', ['buttonText' => 'Update filmeator'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
