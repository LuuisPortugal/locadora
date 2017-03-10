@extends('layouts.app')

@section('content')

    @foreach($filmecategoria as $filmecategorium)
        {!! var_dump($filmecategorium) !!}
    @endforeach


@stop
