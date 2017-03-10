@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['endereco.update', $endereco->id], 'method' => 'post']) !!}
    @include('endereco.partials.form', ['buttonText' => 'Update endereco'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
