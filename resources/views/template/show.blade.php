@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    <section class="main-container">
        @include('blocks.header')

        <div class="template-page-header">
            <img src="/img/icon_dropdown.png" alt=""> <a href="/app/{{ $team->slug }}/templates">Шаблоны</a> / {{ $template->name }}
        </div>

        <div class="tasks">
            @foreach ($template->task_templates as $task)
                <div class="task">
                    <header class="task-header">
                        <h3 class="task-title">
                            {{ $task->name }}
                        </h3>
                        <div class="task-description">
                            {{ $task->description }}
                        </div>
                    </header>

                    <footer class="task-footer">
                        {{-- <select name="role_id" id="" class="task-footer-state">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"> {{ $role->name }}</option>
                            @endforeach
                        </select> --}}
                        <div class="task-role">
                            {{ $task->role->name }}
                        </div>

                        <div class="task-time">
                            {{ gmdate('H:i', $task->time_expected) }}
                        </div>

                        <a class="team-mate-edit" href="/app/{{ $team->slug }}/template/{{ $template->id }}/task/{{ $task->id }}/edit">
                            Редактирование
                        </a>
                    </footer>
                </div>
            @endforeach

            <a href="/app/{{ $team->slug }}/template/{{ $template->id }}/task/create" class="task task-add">
                <img src="/img/icon_plus.png" alt="" />
                <p class="task-add__text">
                    новый таск
                </p>
            </a>
        </div>
    </section>

@endsection

@section('scripts')
    @parent
@endsection
