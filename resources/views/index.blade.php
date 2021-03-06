@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('main')

    <h1 class="site-title">
        puddlr
    </h1>

    <h2 class="main-title">puddlr</h2>

    <div class="main-form-container">
        <form class="main-form" role="form" method="POST" action="/check_domain">
            {{ csrf_field() }}

            <img src="/img/logo.png" alt="" class="main-form__logo">

            <h3 class="main-form__title">
                Впишите домен вашей платформы
            </h3>

            <div class="main-form-inputs main-form-inputs_team">
                <p>http://puddler.com/</p>
                <input type="text" class="main-form-input main-form-input_team" name="domain" placeholder="team-domain">
            </div>

            <button type="submit" class="main-form__in">
                Продолжить
            </button>
        </form>

        <div class="main-form-footer">
            Вы здесь впервые?
            <a href="/register">Регистрация</a>
        </div>
    </div>

@endsection

@section('scripts')
    @parent
@endsection
