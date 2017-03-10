@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['cidade.update', $cidade->id], 'method' => 'post']) !!}
    @include('cidade.partials.form', ['buttonText' => 'Update cidade'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
