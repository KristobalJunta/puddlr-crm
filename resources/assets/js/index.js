import modals from "./modals";

export default class App {
    constructor () {

        this.setHandlers();
        // this.initVkWidgets();
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
                document.body.classList.add('disable-hover')
            }

            timer = setTimeout(function(){
                document.body.classList.remove('disable-hover')
            },300);
        });

        //sliders
        // $(".slider-slides").responsiveSlides({
        //     auto: true,
        //     pager: true,
        //     nav: true,
        //     pagination: false,
        //     fade: 500,
        //     timeout: 4000,
        //     namespace: "slider-controls"
        // });

        //masked input
        // $('[name="phone"]').mask('999-999-99-99', {
        //     placeholder: '#'
        // });

        //scrollTo

        // $('a[href^="#"]').on('click', (e) => {
        //     e.preventDefault();
        //     let target = $(e.target || e.src),
        //         scrollTarget = target.attr('href').substr(1);
        //
        //     if ($(scrollTarget).length) {
        //         $('html, body').animate({
        //             scrollTop: $(scrollTarget).offset().top
        //         }, 500);
        //     }
        //     return false;
        // });

        //modals

    }

    // initVkWidgets () {
    //     VK.init({
    //         apiId: 5583943
    //     });
    //
    //     if ($('#vk_comments').length) {
    //         let width = $('.comments').width() - 40;
    //
    //         VK.Widgets.Comments("vk_comments", {
    //             redesign: 1,
    //             limit: 5,
    //             width: width,
    //             attach: "graffiti,photo"
    //         });
    //     }
    //
    //     $('.comments-repost').on('click', (e) => {
    //         e.preventDefault();
    //
    //         VK.Api.call('wall.post', {
    //             message: 'test post'
    //         }, (r) => {
    //             console.log(r);
    //         });
    //     });
    // }
}

let app = new App;
