function positions(latitude, longitude) {
    var url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=07b60e14df693eebed986c32ce31914b`;
    $.get(url).then(data => {
        var grados = (Number(data.main.temp) - 273.15).toFixed(1);
        var iconname = translateWeather(data.weather[0].main);
        $(".weather")
            .find("img")
            .attr("src", "assets/images/" + iconname + ".png");
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
    let from = new Date().setHours(19, 55);
    let to = new Date().setHours(20, 05);

    if (time > from && time < to) {
        $(".container_clock").css("background", "#feee00");
    }
}

function socialModal(filter) {
    if (filter) {
        $(".buscar_modal").addClass("active");
        $(".lupa").css({
            "z-index": "2000",
            color: "white"
        });
        $(".close")
            .find("g path")
            .css({ fill: "#fff" });
    } else {
        $(".socialmedia_modal").addClass("active");

        $(".heart").css({
            "z-index": "2000"
        });
    }
    $("html,body").css({
        overflow: "hidden"
    });
}

function cerrar(filter) {
    if (filter) {
        $(".buscar_modal").removeClass("active");
        $(".lupa").css({
            "z-index": "",
            color: "#feee00"
        });
        $(".close")
            .find("g path")
            .css({ fill: "#feee00" });
    } else {
        $(".socialmedia_modal").removeClass("active");
        $(".heart").css({
            "z-index": ""
        });
    }
    $("html,body").css({
        overflow: "auto"
    });
}
function cerrarPpal() {
    $(".publicidad").hide();

    $("html,body").css({
        overflow: "auto"
    });
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
function saltarAnuncio(){
    let video = $("#video_target");
    video.stop();
    let url = video.find('source').attr('data')
    video.find('source').removeAttr('data')
    $("advertising").hide();
    video.html(`<source src="${url}" type="video/mp4"></source>`)
    video.attr('controls','controls')
    video.load();
}
function openVideo() {
    let url = "/frontend/buscar_video";
    // /FrontEnd/buscar_video

    $.ajax({
        url: url
    })
        .done(data => {
           
            $("advertising").show();
            let urlPrincipal = `${location.href}files/videos/${data.url}`;
            let video = $("#video_target");
            if (data.url_publicidad !== "") {
                let urlpubli = `${location.href}files/videos/${
                    data.url_publicidad
                }`;
                video.append(
                    '<source src="' + urlpubli + '" type="video/mp4" data="'+urlPrincipal+'"></source>'
                );
            }
       
            video.load();
            
          
            let draw_width = 0
            let videoduration = 0;
            let timmer = 2
            var interval  = setInterval(function(e) {
               
                let width = $("advertising").width()
                draw_width += width / video[0].duration
                $("advertising .bar").css('width',draw_width+"px")
            
                videoduration = video[0].duration
                if(timmer >= videoduration)
                clearInterval(interval);
                if(timmer == 4)
                $(".saltar").css('opacity',1)
                timmer ++;
                
            }, 1000);
        
            $(".video_publicitario").show();
            $("html,body").css({
                overflow: "auto"
            });
        })
        .error(error => console.log(error));
}
