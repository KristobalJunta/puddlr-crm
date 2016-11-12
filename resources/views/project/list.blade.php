@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    <section class="main-container">
        @include('blocks.header')
        @include('blocks.projects')
    </section>

@endsection

@section('scripts')
    @parent
@endsection
