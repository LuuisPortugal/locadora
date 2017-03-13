@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                        @yield("page-header-title")
                    </h1>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="text-muted text-left">
                            Menu
                        </h3>
                        <ul class="list-inline">
                            @foreach($linksMenu as $name => $menu)
                                <li>
                                    <a style="{{ $name == Route::current()->getName() ? "font-weight: bold; font-size: 28px;" : "font-size: 20px; " }}"
                                       href="{{ route($name) }}">{{ $menu }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @yield('content-view')
                </div>
            </div>
        </div>
    </div>
@endsection