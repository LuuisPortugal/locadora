@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['filme.update', $filme->id], 'method' => 'post']) !!}
    @include('filme.partials.form', ['buttonText' => 'Update filme'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
