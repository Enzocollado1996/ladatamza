$(".slick-carousel").slick({
  infinite: true,
  vertical: true,
  verticalSwiping: true,
  slidesToShow: 1,
  slidesToScroll: 3,
  prevArrow: $(".top-arrow"),
  nextArrow: $(".bottom-arrow")
});
var clock;
$(document).ready(function() {
  let clock = $(".clock").FlipClock({
    // clockFace: 'HourlyCounter'
    clockFace: "TwentyFourHourClock",
    showSeconds: false
  });
//   var place = i => `   <div class="shadownews">
//   <div class="date">${i} 30/10/2019</div>
//   <div class="title">No se podrán usar las Red Bus que cargaron saldo.</div>
//   <div class="footer">
//       <div class="district">Valle de Uco</div>
//       <div class="clearfix"></div>
//   </div>
// </div>`;
//   var i = 0;
//   var placeContent = $(".place").eq(0);
//   var placeContent2 = $(".place").eq(2);
//   var placeContent3 = $(".place").eq(1);
//   while (i < 5) {
//     placeContent.append(place(i));
//     placeContent2.append(place(i));
//     placeContent3.append(place(i));
//     i++;
//   }

  
  //sur
  let sur = $(".slot_container .sur");
  let quantity_sur = sur.find(".shadownews").get().length;
  var heightPlace_sur = sur.find(".shadownews").height();
  var heightPlaceTotal_sur = heightPlace_sur * (quantity_sur - 1);
  sur.on("touchmove", function() {
    let totalHeight = $(this).height() * 0.12;
    console.log(
      "%c vport  = " + (heightPlaceTotal_sur+ totalHeight),
      "color:#3f51b5;font-weight:bold;"
    );

    let scroll = $(this).scrollTop();
    console.log("%c scroll  = " + scroll, "color:#ff5722;font-weight:bold;");
    if (scroll > (heightPlaceTotal_sur+ totalHeight)) {
   
        $(this).animate({ scrollTop: 0 }, 0);
     
    }
  });
  //

  //norte
  let norte = $(".slot_container .norte");
  let quantity_norte = norte.find(".shadownews").get().length;
  var heightPlace_norte = norte.find(".shadownews").height();
  var heightPlaceTotal_norte = heightPlace_norte * (quantity_norte - 1);
  norte.on("touchmove", function() {
    let totalHeight = $(this).height() * 0.12;
    console.log(
      "%c vport  = " + (heightPlaceTotal_norte + totalHeight),
      "color:#3f51b5;font-weight:bold;"
    );

    let scroll = $(this).scrollTop();
    console.log("%c scroll  = " + scroll, "color:#ff5722;font-weight:bold;");
    if (scroll > heightPlaceTotal_norte + totalHeight) {
 
        $(this).animate({ scrollTop: 0 }, 0);
   
    }
  });
  //
  //centro
  let centro = $(".slot_container .centro");
  let quantity_centro = centro.find(".shadownews").get().length;
  var heightPlace_centro = centro.find(".shadownews").height();
  var heightPlaceTotal_centro = heightPlace_centro * (quantity_centro - 1);
  centro.on("touchmove", function() {
    let totalHeight = $(this).height() * 0.12;
    console.log(
      "%c vport  = " + (heightPlaceTotal_centro + totalHeight),
      "color:#3f51b5;font-weight:bold;"
    );

    let scroll = $(this).scrollTop();
    console.log("%c scroll  = " + scroll, "color:#ff5722;font-weight:bold;");
    if (scroll > heightPlaceTotal_centro + totalHeight) {

        $(this).animate({ scrollTop: 0 }, 0);
   
    }
  });
  //
 
  $("#owl-demo").owlCarousel({
 
    navigation : true, // Show next and prev buttons
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true,
    items : 1, 
    itemsDesktop : false,
    itemsDesktopSmall : true,
    itemsTablet: true,
    itemsMobile : true

});
   

});


function shareNew(url, text, title) {
  navigator
    .share({
      title: "hola",
      text: "compartir",
      url: "https://www.google.com.ar"
    })
    .then(() => {
      console.log("ok");
    });
}

