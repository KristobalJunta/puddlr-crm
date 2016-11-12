<heaader class="header">
    <div class="logo">
        <img class="logo__img" src="/img/logo.png" alt="" />
        <img class="logo__text" src="/img/logo_text.png" alt="">
    </div>

    <nav class="nav">
        <a href="/app/{{ $team->slug }}/projects" class="nav-link">Проекты</a>
        <a href="/app/{{ $team->slug }}/templates" class="nav-link">Шаблоны</a>
        @if($user->admin)
            <a href="/app/{{ $team->slug }}/team" class="nav-link">Управление командой</a>
        @endif
        <a href="#" class="nav-link">
            <img src="/{{ $user->avatar }}" alt="" class="nav-link__avatar">
            {{ $user->name }}
        </a>
        <a href="/logout" class="nav-link nav-link__logout"></a>
    </nav>

</heaader>
