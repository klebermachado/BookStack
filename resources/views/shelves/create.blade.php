@extends('simple-layout')

@section('body')

    <div class="container small">

        <div class="my-s">
            @include('partials.breadcrumbs', ['crumbs' => [
                '/shelves' => [
                    'text' => trans('entities.shelves'),
                    'icon' => 'organization',
                ],
                '/create-shelf' => [
                    'text' => trans('entities.shelves_create'),
                    'icon' => 'add',
                ]
            ]])
        </div>

        <main class="card content-wrap">
            <h1 class="list-heading">{{ trans('entities.shelves_create') }}</h1>
            <form action="{{ url("/shelves") }}" method="POST" enctype="multipart/form-data">
                @include('shelves.form', ['shelf' => null, 'books' => $books])
            </form>
        </main>

    </div>

@stop