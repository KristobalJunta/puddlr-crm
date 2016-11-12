import modals from "./modals";

export default class App {
    constructor () {

        this.setHandlers();
    }

    setHandlers() {
        let that = this;

        let hamburger = document.querySelector('.nav-list__hamburger');
        if (hamburger) {
            hamburger.addEventListener('click', function() {
                hamburger.classList.toggle('active');
            });
        }

        let timer;
        $( window ).on('scroll', function() {
            //no pointer events
            clearTimeout(timer);
            if(!document.body.classList.contains('disable-hover')) {
                document.body.classList.add('disable-hover');
            }

            timer = setTimeout(function(){
                document.body.classList.remove('disable-hover');
            },300);
        });

        $('.team-mate-order__up').on('click', function (e) {
            e.preventDefault();
            let user1 = $(this).parents('.team-mate').data('id'),
                user2 = $(this).parents('.team-mate').prev().data('id');
            $.post({
                url: `/api/user/swap`,
                dataType: json,
                data: {
                    id1: user1,
                    id2: user2
                }
            }).done((r) => {
                console.log(r);
                $(this).parents('.team-mate').insertBefore($(this).parents('.team-mate').next());
            });
            return false;
        });

        $('.team-mate-order__down').on('click', function (e) {
            e.preventDefault();
            let user1 = $(this).parents('.team-mate').data('id'),
                user2 = $(this).parents('.team-mate').next().data('id');
            $.post({
                url: `/api/user/swap`,
                dataType: 'json',
                data: {
                    id1: user1,
                    id2: user2
                }
            }).done((r) => {
                console.log(r);
                $(this).parents('.team-mate').insertAfter($(this).parents('.team-mate').next());
            });
            return false;
        });
    }
}

let app = new App();
