@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    @include('blocks.header')
    <div class="task-wrap">
    <div class="task">

        <form action="/app/{{ $team->slug }}/project/{{ $projectTemplate->id }}/task/{{ $task->id }}/edit" method="POST">
            <input type="hidden" name="_method" value="PATCH">

            <input type="text"
                class="template-new__title"
                placeholder="Название таска" name="name"
                value="{{ $task->name or '' }}">

            <textarea name="" id="" cols="30" rows="10"
                class="template-new__descr" name="description"
                    placeholder="Описание">{{ $task->description or '' }}</textarea>

            <input type="number"
                class="template-new__title"
                placeholder="Часов на выполнение" name="time" value="{{ $task->time_expected or '' }}">

            <select class="template-new__title" name="role">
                @foreach($roles as $role)
                    <option value="{{ $role->slug }}">{{ $role->name }}</option>
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
