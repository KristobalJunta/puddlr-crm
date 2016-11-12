{{-- @if($usersUndertime)
    @foreach ($usersUndertime as $user)
        <p>
            {{ $user['name'] }} - {{ $user['time'] }}
        </p>
    @endforeach
@endif --}}
@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')
    <section class="main-container">
        @include('blocks.header')

        <div class="project-page-header">
            <img src="/img/icon_dropdown.png" alt=""> <a href="/app/{{ $team->slug }}/projects">Проекты</a> / {{ $project->name }}
        </div>

        <div class="tasks">
            @foreach ($project->tasks as $task)
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
                        @if($task->user)
                            <div class="task-footer-user">
                                <img src="/{{ $task->user->avatar }}" alt="" class="nav-link__avatar">
                                {{ $task->user->name }}
                            </div>
                        @endif

                        <select name="" id="" class="task-footer-state">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}"> {{ $status->name }}</option>
                            @endforeach
                        </select>

                        <div class="task-footer-timer" data-time="{{ $task->time_actual }}" data-id="{{ $task->id }}">
                            <div class="task-footer-timer__current">
                                {{ date("H:i:s", mktime(0, 0, $task->time_actual)) }}
                            </div>
                            из
                            <div class="task-footer-timer__of">
                                {{ date("H:i:s", mktime(0, 0, $task->time_expected)) }}
                            </div>
                             час
                        </div>

                        <a class="team-mate-edit" href="/app/{{ $team->slug }}/project/{{ $project->slug }}/task/{{ $task->id }}/edit">
                            Редактирование
                        </a>
                    </footer>
                </div>
            @endforeach

            <a href="/app/{{ $team->slug }}/project/{{ $project->id }}/task/create" class="task task-add">
                <img src="/img/icon_plus.png" alt="" />
                <p class="task-add__text">
                    Новый таск
                </p>
            </a>
        </div>
    </section>
@endsection

@section('scripts')
    @parent
@endsection
