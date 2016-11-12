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
                        <select name="role_id" id="" class="task-footer-state">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"> {{ $role->name }}</option>
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
