@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('title')

@endsection

@section('main')
    @include('blocks.header')

@endsection

@section('scripts')
    @parent
@endsection
