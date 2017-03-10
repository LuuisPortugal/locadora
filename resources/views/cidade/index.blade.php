@extends('layouts.app')

@section('content')

    @foreach($cidades as $cidade)
        {!! var_dump($cidade) !!}
    @endforeach


@stop
