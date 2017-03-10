@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'pagamento.store', 'method' => 'post']) !!}
    @include('pagamento.partials.form', ['buttonText' => 'Create pagamento'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}

@stop
