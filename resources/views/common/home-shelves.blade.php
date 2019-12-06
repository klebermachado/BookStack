@extends('tri-layout')

@section('body')
    @include('shelves.list', ['shelves' => $shelves, 'view' => $view])
@stop

@section('left')
    @auth
    @include('common.home-sidebar')
    @endauth
@stop

@section('right')
    @auth
    <div class="actions mb-xl">
        <h5>{{ trans('common.actions') }}</h5>
        <div class="icon-list text-primary">
            @include('partials.view-toggle', ['view' => $view, 'type' => 'shelf'])
            @include('components.expand-toggle', ['target' => '.entity-list.compact .entity-item-snippet', 'key' => 'home-details'])
        </div>
    </div>
    @endauth
@stop

@section('scripts')
    <script>
        document.getElementById("header-search-box-input").focus()
    </script>
@stop