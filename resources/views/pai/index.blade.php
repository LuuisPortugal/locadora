@extends('layouts.view')
@section('page-header-title', "Paises")
@section('content-view')
    <div class="col-md-9">
        <h3 class="text-muted text-left">
            Lista
        </h3>
        @if(empty($paises))
            <h5> Nenhum Pais.</h5>
        @else
            <table class="table table-condensed table-striped">
                <thead>
                <tr>
                    @foreach(array_keys($paises[0]->toArray()) as $campo)
                        <th>
                            {{ $campo }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($paises->toArray() as $pais)
                    <tr>
                        @foreach($pais as $campo)
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
