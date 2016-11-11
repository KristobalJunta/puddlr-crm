@extends('layouts.master')

@section('main')
    <h1 class="site-title">
        puddlr
    </h1>

    <h2 class="login-title">puddlr</h2>

    <div class="login-form-container">
        <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <img src="/img/logo.png" alt="" class="login-form__logo">

            <h3 class="login-form__title">
                Оптимизируйте проекты - сохраняйте время
            </h3>

            <div class="login-form-inputs">
                <input id="email" type="email" class="login-form-input" name="email" value="{{ old('email') }}" placeholder="e-mail">
                <input id="password" type="password" class="login-form-input" name="password" placeholder="Пароль">
            </div>

            <button type="submit" class="login-form__in">
                Войти
            </button>
        </form>

        <div class="login-form-footer">
            Вы здесь впервые?
            <a href="/register">Регистрация</a>
        </div>
    </div>

@endsection
