@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="/css/main.min.css">
@endsection

@section('title')

@endsection

@section('main')

    <h1 class="site-title">
        puddlr
    </h1>

    <h2 class="main-title">puddlr</h2>

    <div class="main-form-container">
        <form class="main-form" role="form" method="POST" action="/team">
            {{ csrf_field() }}

            <img src="/img/logo.png" alt="" class="main-form__logo">

            <h3 class="main-form__title">
                Впишите домен вашей платформы
            </h3>

            <div class="main-form-inputs main-form-inputs_team">
                <p>http://puddler.com/</p>
                <input type="text" class="main-form-input main-form-input_team" name="team" placeholder="team-domain">
            </div>

            <button type="submit" class="main-form__in">
                продолжить
            </button>
        </form>

        <div class="main-form-footer">
            А мы предупреждаем: Puddler вызывает зависимость...
        </div>
    </div>

@endsection

@section('scripts')
    @parent
@endsection
