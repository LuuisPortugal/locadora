@extends('layouts.app')

@section('content')

    @foreach($clientes as $cliente)
        {!! var_dump($cliente) !!}
    @endforeach


@stop
