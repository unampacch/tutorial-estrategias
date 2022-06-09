$(function() {

    //Apertura y cierre del Menu lateral
    $('.open-menu, .toggler, .open-menu-int').click(function(){
        $('.sidebar').toggleClass('fliph');
        $('.open-menu-int').toggleClass('d-none');
        $('.fa-caret-right').toggleClass('d-none');
        $('.toggler').toggleClass('toggler-open');
        $('.flecha').toggleClass('flecha-open');
    });

    /**-------------------------------------------------
     Codigo para poner en modal los videos
     -------------------------------------------*/
    // Gets the video src from the data-src on each button
    var $videoSrc;
    $('.video-btn').click(function() {
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
});
