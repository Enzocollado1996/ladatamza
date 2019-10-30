function positions(latitude, longitude) {
    var url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=07b60e14df693eebed986c32ce31914b`;
    $.get(url).then(data => {
        var grados = (Number(data.main.temp) - 273.15).toFixed(1);
        var iconname = translateWeather(data.weather[0].main);
        $(".weather")
            .find("img")
            .attr("src", "/assets/images/" + iconname + ".png");
            $(".temp").html(grados + "&#176;");
    });
}

function translateWeather(weatherName) {
    let tiempo = "";
    switch (weatherName) {
        case "Snow":
            tiempo = "nieve";
        case "Clear":
            tiempo = "sol";
        case "Rain":
            tiempo = "lluvia";
        case "Clouds":
            tiempo = "nublado";
        default:
            tiempo = "sol";
    }

    return tiempo;
}
function validateTime() {
    let time = new Date();
    let from = new Date().setHours(19, 50);
    let to = new Date().setHours(20, 10);

    if (time > from && time < to) {
        $(".container_clock").css("background", "#feee00");
    }
}

function socialModal(filter) {
    if (filter) {
        $(".buscar_modal").addClass("active");
        $(".lupa").css({
            "z-index": "2000"
        });
        $(".lupa")
            .find("g path")
            .css({ fill: "#fff" });
            $(".close")
            .find("g path")
            .css({ fill: "#fff" });
    } else {
        $(".socialmedia_modal").addClass("active");
        $(".heart").css('z-index',"2000")
        $(".heart")
        .find("g path")
        .css({ fill: "#feee00" });
       
    }
   
}

function cerrar(filter) {
    if (filter) {
        $(".buscar_modal").removeClass("active");
        $(".lupa").css({
            "z-index": "",
            
        });
        $(".lupa")
        .find("g path")
        .css({ fill: "#000" });
        $(".close")
        $(".close")
            .find("g path")
            .css({ fill: "#feee00" });
    } else {
        $(".socialmedia_modal").removeClass("active");
        $(".heart").css({
            "z-index": ""
        });
        $(".heart")
        .find("g path")
        .css({ fill: "#000" });
    }
 
}
function cerrarPpal() {
    $(".publicidad").hide();
   
}
function closeVideo() {
    $(".saltar").css("opacity", 0);
    $(".bar").css("width", 0);
    clearInterval(interval);
    let video = $("#video_target")[0];
    video.pause();
    $("#video_target").removeAttr("controls");
    $("#video_target")
        .find("source")
        .remove();
    // video.load();
    $(".video_publicitario").hide();
}
function goNews(url) {
    location.href = url;
}
function shareNew(url, text, title) {
    navigator
        .share({
        title,
        text,
        url
      })
    .then(() => console.log("Shared!"))
    .catch(err => console.error(err));      
}

function openVideo() {
    let url = "/frontend/buscar_video";

    $.ajax({
        url: url
    })
        .done(data => {
           
            let urlPrincipal = `${location.href}files/videos/${data.url}`;
            let video = $("#video_target");
            video.removeAttr("controls", "false").attr('autoplay','autoplay');
            video
            .find("source")
            .remove();
            $("advertising").show();
            if (data.url_publicidad !== "") {
                let urlpubli = `${location.href}files/videos/${
                    data.url_publicidad
                }`;
                video.html(
                    '<source src="' +
                        urlpubli +
                        '" type="video/mp4" data="' +
                        urlPrincipal +
                        '"></source>'
                );
            }

            video.load();

            let draw_width = 0;
            let videoduration = 0;
            let timmer = 2;
            interval = setInterval(function(e) {
                let width = $("advertising").width();
                draw_width += width / video[0].duration;
                $("advertising .bar").css("width", draw_width + "px");

                videoduration = video[0].duration;
                if (timmer >= videoduration) clearInterval(interval);
                if (timmer == 5) $(".saltar").css("opacity", 1);
                timmer++;
                console.log(timmer);
            }, 1000);

            $(".video_publicitario").show();
           
        })
        .error(error => console.log(error));
}
function saltarAnuncio() {
    clearInterval(interval);
    let video = $("#video_target");
    video.stop();
    let url = video.find("source").attr("data");
    if (url == undefined) {
        video[0].removeAttr("autoplay");
        $(this).removeAttr("controls", "false");
        video.load();
    } else {
        $("advertising").hide();

        video.html(`<source src="${url}" type="video/mp4"></source>`);
        video.attr("controls", "controls");
        video.load();
    }

    video.find("source").removeAttr("data");
}

function generales(url) {
    location.href = url;
}
function categorias_page(page) {
    var pathname = window.location.pathname;
    var pathname = pathname + '?page=' + page +'&request=ajax';
    var baseUrl = document.location.origin;
    var path_imagen_subida = $('#path_imagen_subida img').attr('src');
    var urlnota = $("#url-nota").text();

    $.ajax({
        url: pathname,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(data) {
            console.log(data);
            $.each(data,function(i,item){
                $('<div class="container-categoria row margen-40" id="container-' + item.id + '"><div class="col-md-5 img-nota-categoria" id="nota-' + item.id+ '"></div><div class="contenido-categoria col-md-7" onclick="generales('+urlnota+'/'+ item.slug+')"></div></div>').appendTo('.interior-categoria');
                $('<div class="share btn-share" onclick="shareNew('+"'" + baseUrl + "ladatamza/nota/"+ item.slug + "'"+ ')"></div>').appendTo('#nota-'+item.id);
                $( "#image-shared-clone" ).clone().appendTo('#nota-'+item.id +" .share");
                $('<div class="contenedor-img-txt" id="contenedor-img-txt-'+item.id+'"></div>').appendTo('#nota-'+item.id);
                $('<div class="img-nota"><img src="'+path_imagen_subida + item.imagenes[0].file_url + '/' + item.imagenes[0].filename +'" class="banner"></div>').appendTo('#contenedor-img-txt-'+item.id);
                $('<div class="icons-share"><a onclick="compartirnota('+"'"+ item.slug+"'"+', '+"'facebook'"+')"><i class="fab fa-facebook-f"></i></a><a onclick="compartirnota('+"'"+ item.slug+"'"+', '+"'wsp'"+')"><i class="fab fa-whatsapp"></i></a><a onclick="compartirnota('+"'"+ item.slug+"'"+', '+"'twitter'"+')"><i class="fab fa-twitter"></i></a><a onclick="compartirnota('+"'"+ item.slug+"'"+', '+"'mailito'"+')"><i class="fas fa-envelope"></i></a></div>').appendTo('#nota-'+item.id);
                $('<div class="keyword">' + item.palabras_claves + '</div>').appendTo('#container-'+item.id +" .contenido-categoria");
                $('<div id="'+item.id+'"class="titulo-nota-categoria">' + item.titulo + '</div>').appendTo('#container-'+item.id +" .contenido-categoria");
                $('<div class="descripcion-articulo">' + item.descripcion + '</div>').appendTo('#container-'+item.id +" .contenido-categoria");
                $("#footer-categoria").appendTo(".interior-categoria");
                shareEffect ('.container-categoria');
            })
        },
        error: function(xhr, textStatus, exceptionThrown) {
            alert(xhr);
         },
    });//<div class="contenido-categoria col-md-7" onclick="generales('123')>
    
}

function gifOnHover(){
    $( ".contenedor-img-txt .contenido" ).mouseover(function() {
    var $notaId = $(this).parent().attr('id');
    var $notaActual = '#' + $notaId; 
    if ( $($notaActual + ' .gif').length > 0 ) {
        $($notaActual + ' .gif').removeClass('hidden');
        $($notaActual + ' .banner.imagen').addClass('hidden');

        $($notaActual + " .contenido" ).mouseleave(function(e){
            $($notaActual + ' .gif').addClass('hidden');
            $($notaActual + ' .banner.imagen').removeClass('hidden');
        });
    }
})
}

function shareEffect(container){
    $(container + ' .btn-share').click(function(){
        var $notaId = $(this).parent().attr('id');
        var $notaActual = '#' + $notaId;
        if ($($notaActual +  ' .btn-share').hasClass("close-share") == false){
                $($notaActual + ' .img-nota').addClass('hover-yellow');
                $($notaActual + '  .btn-share img').attr('src','/img/../assets/images/close_negro.svg');
                $($notaActual + '  .btn-share').addClass('close-share');
                $($notaActual + '  .icons-share').fadeIn(500);
    
        }else{
            $($notaActual + ' .img-nota').removeClass('hover-yellow');
            $($notaActual + '  .btn-share img').attr('src','/img/../assets/images/share.svg');
            $($notaActual + '  .btn-share').removeClass('close-share');
            $($notaActual + '  .icons-share').hide();
        }
    })
}
function compartirnota(link, social){
    var baseUrl = document.location.origin;

    if(social == 'facebook'){
        var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + baseUrl + '/nota/' + link, 'facebook-popup', 'height=350,width=600');
        if(facebookWindow.focus) { facebookWindow.focus(); }
        return false;
    }

    if(social == 'twitter'){
        var twitterWindow = window.open('https://twitter.com/share?url=' + baseUrl + '/nota/' + link, 'twitter-popup', 'height=350,width=600');
        if(twitterWindow.focus) { twitterWindow.focus(); }
        return false;
    }
    if(social == 'wsp'){
        var twitterWindow = window.open('https://web.whatsapp.com/send?text=Lea esta noticia '+ baseUrl + '/nota/' + link);
        if(twitterWindow.focus) { twitterWindow.focus(); }
        return false;
    }
    if(social == 'mailito'){
        var twitterWindow = window.open('mailto:?body=Lea esta noticia  '+ baseUrl + '/nota/' + link);
        if(twitterWindow.focus) { twitterWindow.focus(); }
        return false;
    }



}