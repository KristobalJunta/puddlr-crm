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

        <div class="task-header">
            {{ $project->name }}
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
                        <div class="task-footer-user">
                            <img src="/{{ $task->user->avatar }}" alt="" class="nav-link__avatar">
                            {{ $task->user->name }}
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
        </div>
    </section>
@endsection

@section('scripts')
    @parent
@endsection
