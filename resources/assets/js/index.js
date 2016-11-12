import modals from "./modals";

export default class App {
    constructor () {

        this.setHandlers();
    }

    setHandlers() {
        let that = this;

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
                dataType: 'json',
                data: {
                    id1: user1,
                    id2: user2
                }
            }).done((r) => {
                console.log(r);
                $(this).parents('.team-mate').insertBefore($(this).parents('.team-mate').prev());
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

        $('.template-add').on('click', function() {
            modals.open('.modal-add');
        });


        //timer
        let cardTimer = false;
        let i = 0,
            id;
        $('.task-footer-timer').on('click', function() {
            let timerElement = $(this).find('.task-footer-timer__current');

            if (cardTimer) {
                window.clearInterval(cardTimer);
                cardTimer = false;

                let time = i;
                let data = new FormData();
                data.append('time_actual', i);
                data.append('id', id);

                this.dataset.time = i;

                $.post('/api/update_time/', data);
            } else {
                $('.task-footer-timer').removeClass('active');
                $(this).addClass('active');

                let new_id = $(this).data('id');
                i = parseInt(this.dataset.time);

                cardTimer = window.setInterval(function() {
                    timerElement.html(prettyTime(i));
                    console.log(prettyTime(i));
                    i++;
                }, 1000);
            }
        });
    }
}

let app = new App();

function prettyTime(seconds) {
    let intHrs = seconds / 3600;
    seconds = seconds % 3600;

    let hrs = parseInt(intHrs).toString();
    let mins = parseInt(seconds / 60).toString();
    let secs = parseInt(seconds % 60).toString();

    if (hrs.length < 2) {
        hrs = 0 + hrs;
    }
    if (mins.length < 2) {
        mins = 0 + mins;
    }
    if (secs.length < 2) {
        secs = 0 + secs;
    }

    return `${hrs}:${mins}:${secs}`;
}
