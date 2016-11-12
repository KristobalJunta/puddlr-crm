<div class="modal">
    <div class="modal-bg"></div>
    <div class="modal-content">
        <div class="template-new">
            <div class="template-new__header">
                о Шаблоне
            </div>

            <form action="/app/{{ $team->slug }}/template" method="POST">
                <input type="text"
                    class="template-new__title"
                    placeholder="Промо-страница" name="name">

                <textarea name="" id="" cols="30" rows="10"
                    class="template-new__descr" name="description"
                        placeholder="Применяется для рекламных страниц и некоторых одностраничников."></textarea>

                <div class="template-new__buttons">
                    <a href="#" class="template-new__button template-new__button_back">
                        отмена
                    </a>
                    <button type="button" name="button" class="template-new__button_ok">
                        сохранить
                    </button>
                </div>

            </form>
        </div>

        <div class="modal-close"></div>
    </div>
</div>
