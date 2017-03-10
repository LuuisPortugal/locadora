@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['idioma.update', $idioma->id], 'method' => 'post']) !!}
    @include('idioma.partials.form', ['buttonText' => 'Update idioma'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
