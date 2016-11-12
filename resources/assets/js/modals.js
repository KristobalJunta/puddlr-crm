let modals =  {
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

export default modals;

$('.modal-bg, .modal-close').on('click', function() {
    modals.close.call(this);
});
