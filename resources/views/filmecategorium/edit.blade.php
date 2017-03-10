@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['filmecategorium.update', $filmecategorium->id], 'method' => 'post']) !!}
    @include('filmecategorium.partials.form', ['buttonText' => 'Update filmecategorium'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
