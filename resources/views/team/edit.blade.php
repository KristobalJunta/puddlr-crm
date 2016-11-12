@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')
    <div class="main-container">
        @include('blocks.header')
        <div class="task-wrap">
            <div class="task">
                <form action="/app/{{ $team->slug }}/manage/user/{{ $editUser->id }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="team_id" value="{{ $team->id }}">

                    <input type="text"
                        class="template-new__title"
                        placeholder="Имя" name="name"
                        value="{{ $editUser->name or '' }}">

                    <input type="email"
                        class="template-new__title"
                        placeholder="Почта" name="email"
                        value="{{ $editUser->email or '' }}">

                    <input type="password"
                        class="template-new__title"
                        placeholder="Пароль" name="password" value="">

                    <select class="template-new__title" name="role_id">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>

                    <button type="submit">
                        Редактировать
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
@endsection
