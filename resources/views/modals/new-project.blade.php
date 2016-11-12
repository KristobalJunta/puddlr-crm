<div class="modal modal-add">
    <div class="modal-bg"></div>
    <div class="modal-content">
        <div class="template-new">
            <div class="template-new__header">
                о Шаблоне
            </div>

            <form action="/app/{{ $team->slug }}/project" method="POST">
                {!! csrf_field() !!}
                <input type="text"
                    class="template-new__title"
                    placeholder="Название " name="name">

                <textarea name="" id="" cols="30" rows="10"
                    class="template-new__descr" name="description"
                        placeholder="Описание."></textarea>

                <select class="" name="">
                    <?php // TODO: fix it ?>
                    @foreach($variable as $key => $value)
                        <option value=""></option>
                    @endforeach
                </select>

                <div class="template-new__buttons">
                    <a href="#" class="template-new__button template-new__button_back">
                        отмена
                    </a>
                    <button type="submit" name="submit" class="template-new__button_ok">
                        сохранить
                    </button>
                </div>

            </form>
        </div>

        <div class="modal-close"></div>
    </div>
</div>
