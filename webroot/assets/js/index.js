$(document).ready(function() {
    setTimeout(() => {
        if (!sessionStorage.getItem("mp")) $(".publicidad").show();
        sessionStorage.setItem("mp", true);
        $("html,body").css({
            overflow: "hidden"
        });
    }, 5000);
    setInterval(() => {
        validateTime();
    }, 1000);

    var watchID = navigator.geolocation.getCurrentPosition(function(position) {
        positions(position.coords.latitude, position.coords.longitude);
    });

    let clock = $(".clock").FlipClock({
        // clockFace: 'HourlyCounter'
        clockFace: "TwentyFourHourClock",
        showSeconds: false
    });

    //sur
    let sur = $(".slot_container .sur");
    let quantity_sur = sur.find(".shadownews").get().length;
    var heightPlace_sur = sur.find(".shadownews").height();
    var heightPlaceTotal_sur = heightPlace_sur * (quantity_sur - 2.2);
    sur.on("touchmove", function() {
        console.log(
            "%c vport  = " + heightPlaceTotal_sur,
            "color:#3f51b5;font-weight:bold;"
        );

        let scroll = $(this).scrollTop();
        console.log(
            "%c scroll  = " + scroll,
            "color:#ff5722;font-weight:bold;"
        );
        if (scroll > heightPlaceTotal_sur) $(this).animate({ scrollTop: 0 }, 0);
    });
    //

    //norte
    let norte = $(".slot_container .norte");
    let quantity_norte = norte.find(".shadownews").get().length;
    var heightPlace_norte = norte.find(".shadownews").height();
    var heightPlaceTotal_norte = heightPlace_norte * (quantity_norte - 2.2);
    norte.on("touchmove", function() {
        let scroll = $(this).scrollTop();

        if (scroll > heightPlaceTotal_norte)
            $(this).animate({ scrollTop: 0 }, 0);
    });
    //
    //centro
    let centro = $(".slot_container .centro");
    let quantity_centro = centro.find(".shadownews").get().length;
    var heightPlace_centro = centro.find(".shadownews").height();
    var heightPlaceTotal_centro = heightPlace_centro * (quantity_centro - 2.2);
    centro.on("touchmove", function() {
        let scroll = $(this).scrollTop();
        if (scroll > heightPlaceTotal_centro)
            $(this).animate({ scrollTop: 0 }, 0);
    });
    //

    $("#owl-demo").owlCarousel({
        autoHeight: false,
        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        items: 1,
        itemsDesktop: false,
        itemsDesktopSmall: true,
        itemsTablet: true,
        itemsMobile: true
    });

    $("#target").submit(function(event) {
        event.preventDefault();
        let data = $(this).find('input').val()
        location.href = `${$(this).attr('action')}/${data}`
    });

    $('#video_target').on('ended',function(){
        
        let url = $(this).find('source').attr('data')
            $("advertising").hide();
        $(this).html(`<source src="${url}" type="video/mp4"></source>`)
        $(this).attr('controls','controls')
        $(this).load();
    });
});
