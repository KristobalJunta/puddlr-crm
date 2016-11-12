<section class="projects">
    @foreach ($projects as $project)
        <div class="project">
            <header class="project-header">
                <h4 class="project-template-title">
                    Шаблон:
                    <span class="project-name">
                        {{ $project->project_template->name }}
                    </span>
                </h4>
                <h3 class="project-title">
                    {{ $project->name }}
                </h3>
                <div class="project-description">
                    {{ $project->description }}
                </div>
            </header>

            <footer class="project-footer">
                {{-- <a class="project-archive" href="">В архив</a> --}}
                <a class="project-open" href="/app/{{ $team->slug }}/project/{{ $project->slug }}">Перейти к проекту</a>
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
