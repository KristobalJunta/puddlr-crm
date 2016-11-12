@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    <section class="main-container">
        @include('blocks.header')
        <form action="/app/{{ $team->slug }}/project" method="post" class="project-form">
            {!! csrf_field() !!}

            <div class="input-group">
                <lablel>Шаблон проекта</lablel>
                <select name="project_template_id">
                    @foreach ($templates as $template)
                        <option value="{{ $template->id }}">{{ $template->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="input-group">
                <label for="">Название проекта</label>
                <input type="text" name="name" placeholder="Название">
            </div>
            <div class="input-group">
                <label for="">Описание проекта</label>
                <textarea name="description" placeholder="Описание"></textarea>
            </div>

            @foreach($users as $member)
                <div class="project-form-user">
                    Квота рабочего времени для {{ $member->name }} ({{ $member->role->name }})
                    <input type="text" name="quotas[{{ $member->id }}]" value="" placeholder="(в часах)">
                </div>
            @endforeach

            <button type="submit" class="project-form__submit">
                Создать
            </button>
        </form>
    </section>

@endsection

@section('scripts')
    @parent
@endsection
