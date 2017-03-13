@extends('layouts.view')
@section('page-header-title', "Cidades")
@section('content-view')
    <div class="col-md-9">
        <h3 class="text-muted text-left">
            Lista
        </h3>
        @if(empty($cidades))
            <h5> Nenhuma Cidade.</h5>
        @else
            <table class="table table-condensed table-striped">
                <thead>
                <tr>
                    @foreach(array_keys($cidades[0]->toArray()) as $campo)
                        <th>
                            {{ $campo }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($cidades->toArray() as $cidade)
                    <tr>
                        @foreach($cidade as $campo)
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
