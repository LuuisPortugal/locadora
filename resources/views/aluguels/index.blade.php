@extends('layouts.app')

@section('content')

    @foreach($aluguels as $aluguel)
        {!! var_dump($aluguel) !!}
    @endforeach

@stop
