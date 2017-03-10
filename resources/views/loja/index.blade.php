@extends('layouts.app')

@section('content')

    @foreach($lojas as $loja)
        {!! var_dump($loja) !!}
    @endforeach


@stop
