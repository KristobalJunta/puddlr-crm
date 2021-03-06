@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')
    <div class="main-container">
        @include('blocks.header')
        <div class="task-wrap">
            <div class="task">
                <form action="/app/{{ $team->slug }}/project/{{ $project->slug }}/task" method="POST">
                    <input type="text"
                        class="template-new__title"
                        placeholder="Название таска" name="name"
                        value="">

                    <textarea rows="6" class="template-new__descr" name="description"
                            placeholder="Описание"></textarea>

                    <input type="text"
                        class="template-new__title"
                        placeholder="Часов на выполнение" name="time" value="">

                    <select class="template-new__title" name="user_id">
                        @foreach($users as $member)
                            <option value="{{ $member->id }}">{{ $member->name }} ({{ $member->role->name }})</option>
                        @endforeach
                    </select>

                    <select class="template-new__title" name="status_id">
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit">
                        Создать
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection
