@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['inventario.update', $inventario->id], 'method' => 'post']) !!}
    @include('inventario.partials.form', ['buttonText' => 'Update inventario'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
