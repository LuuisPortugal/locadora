@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'aluguel.store', 'method' => 'post']) !!}
    @include('aluguels.partials.form', ['buttonText' => 'Create aluguels'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
