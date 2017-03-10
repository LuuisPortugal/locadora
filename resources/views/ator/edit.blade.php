@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['ator.update', $ator->id], 'method' => 'post']) !!}
    @include('ator.partials.form', ['buttonText' => 'Update ator'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
