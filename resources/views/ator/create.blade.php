@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'ator.store', 'method' => 'post']) !!}
    @include('ator.partials.form', ['buttonText' => 'Create ator'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
