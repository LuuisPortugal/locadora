@extends('layouts.app')

@section('content')

    @foreach($pagamentos as $pagamento)
        {!! var_dump($pagamento) !!}
    @endforeach


@stop
