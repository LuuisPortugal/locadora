@extends('layouts.app')
@section('page-header-title', "Alugueis")
@section('content')
    <div class="col-md-9">
        <h3 class="text-muted text-left">
            Lista
        </h3>
        @if(empty($aluguels))
            <h5> Nenhum Aluguel.</h5>
        @else
            <div class="table-responsive">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        @foreach(array_keys($aluguels[0]->toArray()) as $campo)
                            <th>
                                {{ $campo }}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aluguels->toArray() as $aluguel)
                        <tr>
                            @foreach($aluguel as $campo)
                                <td>
                                    {{ $campo }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@stop
