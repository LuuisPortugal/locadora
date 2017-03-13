@extends('layouts.view')
@section('page-header-title', "Atores")
@section('content-view')
    <div class="col-md-9">
        <h3 class="text-muted text-left">
            Lista
            <a href="{{ route("ator.create") }}" class="btn btn-success btn-sm pull-right">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Novo
            </a>
        </h3>
        @if(empty($ators))
            <h5> Nenhum Ator.</h5>
        @else
            <div class="table-responsive">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        @foreach(array_keys($ators[0]->toArray()) as $campo)
                            <th>
                                {{ $campo }}
                            </th>
                        @endforeach
                        <th>
                            ações
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ators as $ator)
                        <tr>
                            @foreach($ator->toArray() as $campo)
                                <td>
                                    {{ $campo }}
                                </td>
                            @endforeach
                            <td align="center">
                                <form action="{{ route("ator.destroy", $ator->ator_id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <a href="{{ route("ator.edit", $ator->ator_id) }}" class="btn btn-primary btn-sm"
                                       aria-label="Editar">
                                        <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" aria-label="Excluir">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@stop
