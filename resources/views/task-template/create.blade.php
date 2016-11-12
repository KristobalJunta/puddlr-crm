@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    <div class="task">
        <?php // TODO: fix url ?>
        <form action="/app/{{ $team->slug }}/project/{{ $projectTemplate->id }}/" method="POST">
            <input type="text"
                class="template-new__title"
                placeholder="Название таска" name="name"
                value="">

            <textarea name="" id="" cols="30" rows="10"
                class="template-new__descr" name="description"
                    placeholder="Описание"></textarea>

            <input type="number"
                class="template-new__title"
                placeholder="Часов на выполнение" name="time" value="">

            <select class="template-new__title" name="role">
                @foreach($roles as $role)
                    <option value="{{ $role->slug }}">{{ $role->name }}</option>
                @endforeach
            </select>

            <button type="button" name="button">
                Создать
            </button>
        </form>
    </div>

@endsection

@section('scripts')
    @parent
@endsection
