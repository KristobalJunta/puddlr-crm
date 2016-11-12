@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    <section class="main-container">
        @include('blocks.header')
        {{ $template->name }}

        @foreach($template->task_templates as $task)
            {{ $task }}
        @endforeach
    </section>

@endsection

@section('scripts')
    @parent
@endsection
