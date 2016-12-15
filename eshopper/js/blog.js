function cargarBlogs() {
    $.ajax({
            data: {"user": 2},
            type: "GET",
            dataType: 'jsonp',
            crossDomain: true,
            url: "http://127.0.0.1:8082/webservices/WSBlog.php",
        })
        .done(function(data, textStatus, jqXHR) {
          var textoHTML="";
            for (i = 0; i < data.blogs.length; i++) {
               var texto="<div class=\"single-blog-post\"><h3>"+data.blogs[i].blog.titulo_blog+"</h3><div class=\"post-meta\"><ul><li><i class=\"fa fa-user\"></i> "+data.blogs[i].blog.Nombre+"</li><li><i class=\"fa fa-clock-o\"></i> 1:33 pm</li><li><i class=\"fa fa-calendar\"></i>"+data.blogs[i].blog.fecha_blog+"</li></ul><span><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star\"></i><i class=\"fa fa-star-half-o\"></i></span></div><a href=\"\"><img src=\"images/blog/blog-one.jpg\" alt=\"\"></a><p>"+data.blogs[i].blog.texto_blog+"</p><a  class=\"btn btn-primary\" href=\"\">Leer Mas</a></div>";
                console.log(data.blogs[i].blog.idblog);
                console.log(data.blogs[i].blog.titulo_blog);
                textoHTML=textoHTML+texto;
            }
            document.getElementById('prueba').innerHTML=textoHTML;

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
