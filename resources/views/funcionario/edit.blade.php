@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['funcionario.update', $funcionario->id], 'method' => 'post']) !!}
    @include('funcionario.partials.form', ['buttonText' => 'Update funcionario'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
