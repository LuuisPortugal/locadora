@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'inventario.store', 'method' => 'post']) !!}
    @include('inventario.partials.form', ['buttonText' => 'Create inventario'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
