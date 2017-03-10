@extends('layouts.app')

@section('content')

    @foreach($filmeators as $filmeator)
        {!! var_dump($filmeator) !!}
    @endforeach


@stop
