@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => ['pagamento.update', $pagamento->id], 'method' => 'post']) !!}
    @include('pagamento.partials.form', ['buttonText' => 'Update pagamento'])
    {!! Form::close() !!}

    {{-- @include('errors.validation') --}}


@stop
