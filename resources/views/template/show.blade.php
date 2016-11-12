@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    <section class="main-container">
        @include('blocks.header')

        <div class="task-header">
            {{ $template->name }}
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
                        <div class="task-footer-user">
                            <img src="/{{ $user->avatar }}" alt="" class="nav-link__avatar">
                            {{ $user->name }}
                        </div>

                        <select name="" id="" class="task-footer-state">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}"> {{ $status->name }}</option>
                            @endforeach
                        </select>

                        <div class="team-mate-edit">
                            Редактирование
                        </div>
                    </footer>
                </div>
            @endforeach

            <a href="/app/{{ $team->slug }}/project/{{ $template->id }}/create" class="task task-add">
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
