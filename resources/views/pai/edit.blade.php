@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['pai.update', $pai->id], 'method' => 'post']) !!}
    @include('pai.partials.form', ['buttonText' => 'Update pai'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
