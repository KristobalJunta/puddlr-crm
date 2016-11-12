@extends('layouts.master')

@section('main')
    <h1 class="site-title">
        puddlr
    </h1>

    <h2 class="main-title">puddlr</h2>

    <div class="main-form-container">
        <form class="main-form" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <img src="/img/logo.png" alt="" class="main-form__logo">

            <h3 class="main-form__title">
                Оптимизируйте проекты - сохраняйте время
            </h3>

            <div class="main-form-inputs">
                <input id="name" type="text" class="main-form-input main-form-input_name" name="name" value="{{ old('name') }}" placeholder="Имя">
                <p>принимаю <a href="">правила</a>, мои данные:</p>
                <input id="email" type="email" class="main-form-input" name="email" value="{{ old('email') }}" placeholder="e-mail">
                <input id="password" type="password" class="main-form-input" name="password" placeholder="Пароль">
            </div>

            <div class="main-form-inputs main-form-inputs_team">
                <p>http://puddler.com/</p>
                <input type="text" class="main-form-input main-form-input_team" name="domain" placeholder="team-domain">
            </div>

            <button type="submit" class="main-form__in">
                Регистрация
            </button>
        </form>

        <div class="main-form-footer">
            Вы уже с нами?
            <a href="/login">Войти</a>
        </div>
    </div>

@endsection
