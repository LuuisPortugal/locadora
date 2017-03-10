@extends('layouts.app')

@section('content')

    @foreach($idiomas as $idioma)
        {!! var_dump($idioma) !!}
    @endforeach


@stop
