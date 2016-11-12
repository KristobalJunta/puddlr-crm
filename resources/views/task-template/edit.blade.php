@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')
    @include('blocks.header')
    <div class="task-wrap">
        <div class="task">
            <form action="/app/{{ $team->slug }}/template/{{ $projectTemplate->id }}/task/{{ $task->id }}" method="POST">
                <input type="hidden" name="_method" value="PATCH">

                <input type="text"
                    class="template-new__title"
                    placeholder="Название таска" name="name"
                    value="{{ $task->name or '' }}">

                <textarea rows="6" class="template-new__descr" name="description"
                        placeholder="Описание">{{ $task->description or '' }}</textarea>

                <input type="text"
                    class="template-new__title"
                    placeholder="Часов на выполнение" name="time" value="<?php $a = $task->time_expected ?  $task->time_expected/3600 : ''; echo $a; ?>">

                <select class="template-new__title" name="role_id">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                <button type="submit" name="submit">
                    Редактировать
                </button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection
