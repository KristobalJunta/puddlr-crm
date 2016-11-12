@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    <section class="main-container">
        @include('blocks.header')
        <form action="/app/{{ $team->slug }}/project">
            {!! csrf_field() !!}
            <select name="project_template_id">
                @foreach ($templates as $template)
                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                @endforeach
            </select>

            <input type="text" name="name" placeholder="Имя">
            <textarea name="description" placeholder="Описание"></textarea>

            @foreach($users as $member)
                <input type="text" name="quota[{{$user->id}}]" value="" placeholder="квота для {{ $user->name }}">
            @endforeach
        </form>
    </section>

@endsection

@section('scripts')
    @parent
@endsection
