$(function() {

    //Apertura y cierre del Menu lateral
    $('.open-menu, .toggler, .open-menu-int').on('click', function() {
        if (localStorage.getItem("abierto") === null) {
            localStorage.setItem('abierto', 'true');
        }else if (localStorage.getItem("abierto") == 'true' ){
            localStorage.setItem('abierto', 'false');
        }else if (localStorage.getItem("abierto") == 'false' ){
            localStorage.setItem('abierto', 'true');
        }
        $('.sidebar').toggleClass('fliph');
        $('.open-menu-int').toggleClass('d-none');
        $('.fa-caret-right').toggleClass('d-none');
        $('.toggler').toggleClass('toggler-open');
        $('.flecha').toggleClass('flecha-open');
        

    });

    if (localStorage.getItem("abierto") == 'true') {
        $('.sidebar').toggleClass('fliph');
        $('.open-menu-int').toggleClass('d-none');
        $('.fa-caret-right').toggleClass('d-none');
        $('.toggler').toggleClass('toggler-open');
        $('.flecha').toggleClass('flecha-open');
    }

/* Opción sin jQuery
    let toggle = document.getElementById("toggler");
    let flecha = document.getElementById("flecha");
    let menuInt = document.getElementsByClassName("open-menu-int")[0];
    let sideBar = document.getElementsByClassName("sidebar")[0];

    toggle.addEventListener("click", menuCierre);
    function menuCierre() {
        toggle.classList.toggle('toggler-open');
        flecha.classList.toggle('flecha-open');
        menuInt.classList.toggle('d-none');
        sideBar.classList.toggle('fliph');
        };
*/
    /**-------------------------------------------------
     Codigo para poner en modal los videos
     -------------------------------------------*/
    // Gets the video src from the data-src on each button
    var $videoSrc;
    $('.video-btn').on( 'click', function() {
        $videoSrc = $(this).data( "src" );
    });

    // when the modal is opened autoplay it
    $('#VideosModal').on('shown.bs.modal', function (e) {
        // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
    });

    // stop playing the youtube video when I close the modal
    $('#VideosModal').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src',$videoSrc);
    });

    $('.flash-modal').modal('show');

    $("#honeyAlonso").checkRadioHoney();

    var scroll = new SmoothScroll('a#fechascroll[href*="#"]', {
        speed: 1000
    });
});
