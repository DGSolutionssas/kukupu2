jQuery(document).ready(function($) {
    $('#myCarousel').carousel({
        interval: 5000
    });
    //Handles the carousel thumbnails
    $('[id^=carousel-selector-]').click(function() {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid.bs.carousel', function(e) {
        var id = $('.item.active').data('slide-number');
        $('#carousel-text').html($('#slide-content-' + id).html());
    });
});

function cargarVideos() {
    $.ajax({
            data: {"user": 2},
            type: "GET",
            dataType: 'jsonp',
            crossDomain: true,
            url: "http://127.0.0.1/webservices/WSVideos.php",
        })
        .done(function(data, textStatus, jqXHR) {
          var textoHTML="";
            for (i = 0; i < data.videos.length; i++) {
                var texto = "<div class=\"col-sm-4\"><h2 class=\"title\">"+data.videos[i].video.TituloVideo+"</h2><div class=\"embed-responsive embed-responsive-16by9\"><iframe class=\"embed-responsive-item\" src=\"https://www.youtube.com/embed/GOf83WM__LY\"></iframe></div></div>";
                console.log(data.videos[i].video.idVideo);
                console.log(data.videos[i].video.TituloVideo);
                console.log(data.videos[i].video.DescripcionVideo);
                console.log(data.videos[i].video.Url);
                textoHTML=textoHTML+texto;
            }
            document.getElementById('zonaVideos').innerHTML=textoHTML;

            if (console && console.log) {
                console.log("La solicitud se ha completado correctamente.");
            }
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
            }
        });
}
