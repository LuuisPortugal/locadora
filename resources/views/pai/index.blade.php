@extends('layouts.app')

@section('content')

    @foreach($pais as $pai)
        {!! var_dump($pai) !!}
    @endforeach


@stop
