@extends('layouts.master')

@section('main')
    <h1 class="site-title">
        puddlr
    </h1>

    <h2 class="main-title">puddlr</h2>

    <div class="main-form-container">
        <form class="main-form" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <input type="hidden" name="domain" value="{{ session('domain') }}">

            <img src="/img/logo.png" alt="" class="main-form__logo">

            <h3 class="main-form__title">
                Оптимизируйте проекты - сохраняйте время
            </h3>

            <div class="main-form-inputs">
                <input id="email" type="email" class="main-form-input" name="email" value="{{ old('email') }}" placeholder="e-mail">
                <input id="password" type="password" class="main-form-input" name="password" placeholder="Пароль">
            </div>

            <p class="main-form__domain">
                http://puddler.com/gorlachov
            </p>

            <a href="" class="main-form__back">
                назад
            </a>

            <button type="submit" class="main-form__in">
                Войти
            </button>
        </form>

        <div class="main-form-footer">
            Вы здесь впервые?
            <a href="/register">Регистрация</a>
        </div>
    </div>

@endsection
