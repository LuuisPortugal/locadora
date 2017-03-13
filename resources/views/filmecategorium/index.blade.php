@extends('layouts.view')
@section('page-header-title', "Filmes Categoria")
@section('content-view')
    <div class="col-md-9">
        <h3 class="text-muted text-left">
            Lista
        </h3>
        @if(empty($filmeCategoria))
            <h5> Nenhum Filme Categoria.</h5>
        @else
            <table class="table table-condensed table-striped">
                <thead>
                <tr>
                    @foreach(array_keys($filmeCategoria[0]->toArray()) as $campo)
                        <th>
                            {{ $campo }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($filmeCategoria->toArray() as $filmecategorium)
                    <tr>
                        @foreach($filmecategorium as $campo)
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
