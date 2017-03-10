@extends('layouts.app')

@section('content')

    @foreach($funcionarios as $funcionario)
        {!! var_dump($funcionario) !!}
    @endforeach


@stop
