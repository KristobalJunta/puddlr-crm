<section class="team">
    @foreach($team->users()->orderBy('priority')->get() as $member)
        <div class="team-mate" data-id="{{ $member->id }}">
            <div class="team-mate-order">
                <div class="team-mate-order__up"></div>
                <div class="team-mate-order__down"></div>
            </div>

            <div class="team-mate-name">
                <img src="/{{ $member->avatar }}" alt="" class="team-mate-name__avatar">
                {{ $member->name }}
            </div>

            <div class="team-mate-role">
                {{ $member->role->name }}
            </div>

            <div class="team-mate-mail">
                {{ $member->email }}
            </div>

            <a class="team-mate-edit" href="/app/{{ $team->slug }}/manage/user/{{ $member->id }}/edit">
                Редактирование
            </a>
        </div>
    @endforeach

    <a href="/app/{{ $team->slug }}/manage/user/create">
        <div class="team-mate team-mate-add">
            <img src="/img/icon_plus.png" alt="">
            <p class="team-mate-add__text">
                новый тиммейт
            </p>
        </div>
    </a>
</section>
