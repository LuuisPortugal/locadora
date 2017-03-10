@extends('layouts.app')

@section('content')

    @foreach($filmetextos as $filmetexto)
        {!! var_dump($filmetexto) !!}
    @endforeach


@stop
