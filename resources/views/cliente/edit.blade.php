@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['cliente.update', $cliente->id], 'method' => 'post']) !!}
    @include('cliente.partials.form', ['buttonText' => 'Update cliente'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
