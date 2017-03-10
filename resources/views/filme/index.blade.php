@extends('layouts.app')

@section('content')

    @foreach($filmes as $filme)
        {!! var_dump($filme) !!}
    @endforeach


@stop
