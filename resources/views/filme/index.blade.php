@extends('layouts.view')
@section('page-header-title', "Filmes")
@section('content-view')
    <div class="col-md-9">
        <h3 class="text-muted text-left">
            Lista
        </h3>
        @if(empty($filmes))
            <h5> Nenhum filme.</h5>
        @else
            <table class="table table-condensed table-striped">
                <thead>
                <tr>
                    @foreach(array_keys($filmes[0]->toArray()) as $campo)
                        <th>
                            {{ $campo }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($filmes->toArray() as $filme)
                    <tr>
                        @foreach($filme as $campo)
                            <td>
                                {{ $campo }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@stop
