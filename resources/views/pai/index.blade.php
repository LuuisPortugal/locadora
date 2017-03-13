@extends('layouts.view')
@section('page-header-title', "Paises")
@section('content-view')
    <div class="col-md-9">
        <h3 class="text-muted text-left">
            Lista
            <a href="{{ route("pai.create") }}" class="btn btn-success btn-sm pull-right">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Novo
            </a>
        </h3>
        @if(empty($paises))
            <h5> Nenhum Pais.</h5>
        @else
            <div class="table-responsive">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        @foreach(array_keys($paises[0]->toArray()) as $campo)
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
                    @foreach($paises as $pais)
                        <tr>
                            @foreach($pais->toArray() as $campo)
                                <td>
                                    {{ $campo }}
                                </td>
                            @endforeach
                            <td align="center">
                                <form action="{{ route("pai.destroy", $pais->pais_id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <a href="{{ route("pai.edit", $pais->pais_id) }}" class="btn btn-primary btn-sm"
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
