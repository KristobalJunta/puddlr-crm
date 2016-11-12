import modals from "./modals";

export default class App {
    constructor () {

        this.setHandlers();
        // this.initVkWidgets();
    }

    setHandlers() {
        let that = this;

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
    }
}

let app = new App;
