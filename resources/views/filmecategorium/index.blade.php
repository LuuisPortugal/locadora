@extends('layouts.view')
@section('page-header-title', "Filmes Categoria")
@section('content-view')
    <div class="col-md-9">
        <h3 class="text-muted text-left">
            Lista
            <a href="{{ route("filmecategorium.create") }}" class="btn btn-success btn-sm pull-right">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Novo
            </a>
        </h3>
        @if(empty($filmeCategoria))
            <h5> Nenhum Filme Categoria.</h5>
        @else
            <div class="table-responsive">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        @foreach(array_keys($filmeCategoria[0]->toArray()) as $campo)
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
                    @foreach($filmeCategoria as $filmecategorium)
                        <tr>
                            @foreach($filmecategorium->toArray() as $campo)
                                <td>
                                    {{ $campo }}
                                </td>
                            @endforeach
                            <td align="center">
                                <form action="{{ route("filmecategorium.destroy", $filmecategorium->filme_id) }}"
                                      method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <a href="{{ route("filmecategorium.edit", $filmecategorium->filme_id) }}"
                                       class="btn btn-primary btn-sm" aria-label="Editar">
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
