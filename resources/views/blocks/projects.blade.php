<section class="projects">
    @foreach ($projects as $project)
        <div class="project">
            <header class="project-header">
                <h3 class="project-title">
                    Шаблон:
                    <span class="project-name">
                        {{ $project->name }}
                    </span>
                </h3>
                <div class="project-description">
                    {{ $project->description }}
                </div>
            </header>

            <footer class="project-footer">
                <a class="project-archive" href="">В архив</a>
                <a class="project-open" href="">Перейти к проекту</a>
            </footer>
        </div>
    @endforeach

    @if($user->admin)
        <a href="/app/{{ $team->slug }}/project/create">
            <div class="project project-add">
                <img src="/img/icon_plus.png" alt="">
                <div class="project-add__text">
                    Новый проект
                </div>
            </div>
        </a>
    @endif
</section>
