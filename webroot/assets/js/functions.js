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

function openVideo() {
    let url = "/FrontEnd/buscar_video";
    // /FrontEnd/buscar_video

    $.ajax({
        url: url
    }).done(
        data => {
            urlPrincipal = `${location.host}/files/videos/${data.url}`;
            // $("#video_target").html(
            //     '<source src="' + urlPrincipal + '" type="video/mp4"></source>'
            // );
           // $("#video_target")[0].load();
            // $("#video_target")[0].play();

            $(".video_publicitario").show();
            $("html,body").css({
                overflow: "auto"
            });
        },
        err => {
            console.log(err);
        }
    );
}
