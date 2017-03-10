@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['loja.update', $loja->id], 'method' => 'post']) !!}
    @include('loja.partials.form', ['buttonText' => 'Update loja'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
