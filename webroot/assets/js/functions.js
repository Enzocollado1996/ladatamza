function positions(latitude, longitude) {
    var url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=07b60e14df693eebed986c32ce31914b`;
    $.get(url).then(data => {
        var grados = (Number(data.main.temp) - 273.15).toFixed(1);
        var iconname = translateWeather(data.weather[0].main);
        $(".weather")
            .find("img")
            .attr("src", "/ladatamza/assets/images/" + iconname + ".png");
        $(".temp").text(grados + "º");
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
            title: title,
            text: "Ladatamendoza",
            url: url
        })
        .then(() => {
            console.log("ok");
        });
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
    var pathname = pathname + '?page=' + page;
    location.href = pathname;
}
