@extends('layouts.app')

@section('content')

    @foreach($enderecos as $endereco)
        {!! var_dump($endereco) !!}
    @endforeach


@stop
