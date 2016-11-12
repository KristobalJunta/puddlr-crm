<section class="main-container">
    <form action="/app/{{ $team->slug }}/template" method="POST">
        <input type="text"
            class="template-new__title"
            placeholder="Промо-страница" name="name">

        <textarea name="" id="" cols="30" rows="10"
            class="template-new__descr" name="description"
                placeholder="Применяется для рекламных страниц и некоторых одностраничников."></textarea>

        <button type="button" name="button">
            Редактировать
        </button>
    </form>

    @include('blocks.task-template')

</section>
