<section class="templates">
    @foreach ($templates as $template)
        <div class="template">
            <header class="template-header">
                <h3 class="template-title">
                    Шаблон:
                    <span class="template-name">
                        {{ $template->name }}
                    </span>
                </h3>
                <div class="template-description">
                    {{ $template->description }}
                </div>
            </header>

            <footer class="template-footer">
                {{-- <a class="template-archive" href="/app/{{ $team->slug }}/template/{{ $template->id }}/delete">В архив</a> --}}
                <a class="template-open" href="/app/{{ $team->slug }}/template/{{ $template->id }}">Открыть шаблон</a>
            </footer>
        </div>
    @endforeach

    @if($user->admin)
        <div class="template template-add">
            <img src="/img/icon_plus.png" alt="">
            <div class="template-add__text">
                новый шаблон
            </div>
        </div>
    @endif
</section>
