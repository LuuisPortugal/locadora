@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'filmetexto.store', 'method' => 'post']) !!}
    @include('filmetexto.partials.form', ['buttonText' => 'Create filmetexto'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
