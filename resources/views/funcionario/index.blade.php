@extends('layouts.view')
@section('page-header-title', "Funcionários")
@section('content-view')
    <div class="col-md-9">
        <h3 class="text-muted text-left">
            Lista
        </h3>
        @if(empty($funcionarios))
            <h5> Nenhum Funcionário.</h5>
        @else
            <table class="table table-condensed table-striped">
                <thead>
                <tr>
                    @foreach(array_keys($funcionarios[0]->toArray()) as $campo)
                        <th>
                            {{ $campo }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($funcionarios->toArray() as $funcionario)
                    <tr>
                        @foreach($funcionario as $campo)
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
