$(function() {

    //Apertura y cierre del Menu lateral
    $('.open-menu, .dismiss, .open-menu-int').click(function(){
        $('.sidebar').toggleClass('fliph');
        $('.open-menu-int').toggleClass('d-none');
        $('.fa-caret-right').toggleClass('d-none');
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
});


// Shorthand for $( document ).ready()
//Cuestionario Honey-Alonso, paginacion
/*$(function() {
    var cuestionario = $("#honeyAlonso");
    var progress = $(".progress-bar");
    var elementos = $(".pagina", cuestionario);
    var ultimo = elementos.hide().first().fadeIn(300);
    var terminar = $("#terminar", cuestionario).hide();
    var contador = 1;
    var avanceCuest = 12.5;

    progress.css('width', avanceCuest + '%');

    $("#honeyAlonso #avanzar").on( "click", function() {
        ultimo.hide();
        ultimo = ultimo.next().fadeIn(300);
        contador++;
        avanceCuest = avanceCuest + 12.5;
        progress.css('width',avanceCuest + '%');

        if(contador == 8){
            $(this).hide();
            terminar.show();
        }
    });
});*/

/*$(function() {
    $("form").each(function(){
        $form = this;
        $(":submit", this).click(function(e){

            var names = {};

            $(':radio', $form).each(function() {
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() {
                console.log(names);
                count++;
            });
            console.log(count);
            if (count > 0) {
                e.preventDefault();
                if ($(':radio:checked', $form).length < count) {
                    console.log($(':radio:checked', $form).length);
                    alert("falta contestar alguno");
                }else{
                    $($form).submit();
                }
            }else{
                $($form).submit();
            }

        });
    });
});*/
