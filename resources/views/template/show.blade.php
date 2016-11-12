@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    <section class="main-container">
        @include('blocks.header')

        <div class="template-header">
            {{ $template->name }}
        </div>

        <div class="templates">
            @foreach ($template->task_templates as $task)
                <div class="template">
                    {{ $task }}
                </div>
            @endforeach
        </div>
    </section>

@endsection

@section('scripts')
    @parent
@endsection
