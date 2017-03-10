@extends('layouts.app')

@section('content')

    {!! Form::model($aluguel, ['route' => ['aluguel.update', $aluguel->id], 'method' => 'post']) !!}
    @include('aluguels.partials.form', ['buttonText' => 'Update aluguels'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
