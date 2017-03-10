@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['categorium.update', $categorium->id], 'method' => 'post']) !!}
    @include('categorium.partials.form', ['buttonText' => 'Update categorium'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
