@extends('layouts.app')

@section('content')

    @foreach($ators as $ator)
        {!! var_dump($ator) !!}
    @endforeach


@stop
