@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('title')

@endsection

@section('main')

    <section class="main-container">
        @include('blocks.header')
        @include('blocks.projects')
        @foreach ($projects as $project)
            <p>
                {{ $project->name }}
            </p>
        @endforeach
    </section>

@endsection

@section('scripts')
    @parent
@endsection
