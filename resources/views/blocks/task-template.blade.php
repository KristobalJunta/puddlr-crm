<div class="task">
    <?php // TODO: fix url ?>
    <form action="/app/{{ $team->slug }}/project/{{}}/" method="POST">
        <input type="text"
            class="template-new__title"
            placeholder="Название таска" name="name">

        <textarea name="" id="" cols="30" rows="10"
            class="template-new__descr" name="description"
                placeholder="Описание"></textarea>

        <input type="number"
            class="template-new__title"
            placeholder="Часов на выполнение" name="time">

        <button type="button" name="button">
            Редактировать
        </button>
    </form>


</div>
