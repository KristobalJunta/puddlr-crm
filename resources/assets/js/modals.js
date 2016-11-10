export default {
    open: function(selector) {
        let modal = $(selector);
        modal.addClass('show');

        $('html, body').css('overflow', 'hidden');
    },

    close: function() {
        let modal = $(this).parents('.modal');
        modal.removeClass('show');

        $('html, body').css('overflow', 'auto');
    }
}

$('.modal-close').on('click', close);
$('.modal-bg').on('click', close);
