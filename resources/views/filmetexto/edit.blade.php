@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['filmetexto.update', $filmetexto->id], 'method' => 'post']) !!}
    @include('filmetexto.partials.form', ['buttonText' => 'Update filmetexto'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
