@extends('layouts.app')

@section('content')

    @foreach($inventarios as $inventario)
        {!! var_dump($inventario) !!}
    @endforeach


@stop
