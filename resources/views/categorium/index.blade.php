@extends('layouts.app')

@section('content')

    @foreach($categoria as $categorium)
        {!! var_dump($categorium) !!}
    @endforeach


@stop
