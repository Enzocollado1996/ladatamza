
var clock;
function positions(latitude,longitude){

  var url = `http://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=07b60e14df693eebed986c32ce31914b`
  $.get(url).then(
    data => {
      var grados = (Number(data.main.temp) - 273.15).toFixed(1);
      var iconname = translateWeather(data.weather[0].main)
      $(".weather").find('img').attr('src','assets/images/'+iconname+'.png')
      $(".temp").text(grados+"º")
    
    }
  )
}
function translateWeather(weatherName){

  let tiempo = ""
  switch(weatherName){
    case 'Snow' : tiempo = 'nieve';
    case 'Clear' : tiempo = 'sol';
    case 'Rain' : tiempo = 'lluvia';
    case 'Clouds' : tiempo = 'nublado'
    default : tiempo = 'sol';
  }

  return tiempo;
}
function validateTime (){
  let time = new Date()
  let from = new Date().setHours(19,55)
  let to = new Date().setHours(20,05)

  if(time > from && time < to){
    $(".container_clock").css('background','#feee00')
  }

}
$(document).ready(function() {

  setInterval(()=>{
    validateTime()
  },1000)
  
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
  var heightPlaceTotal_sur = heightPlace_sur * (quantity_sur - 1.5);
  sur.on("touchmove", function() {
     console.log(
      "%c vport  = " + (heightPlaceTotal_sur),
      "color:#3f51b5;font-weight:bold;"
    );

    let scroll = $(this).scrollTop();
    console.log("%c scroll  = " + scroll, "color:#ff5722;font-weight:bold;");
    if (scroll > heightPlaceTotal_sur) 
       $(this).animate({ scrollTop: 0 }, 0);
  });
  //

  //norte
  let norte = $(".slot_container .norte");
  let quantity_norte = norte.find(".shadownews").get().length;
  var heightPlace_norte = norte.find(".shadownews").height();
  var heightPlaceTotal_norte = heightPlace_norte * (quantity_norte - 1.5);
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
  var heightPlaceTotal_centro = heightPlace_centro * (quantity_centro - 1.5);
  centro.on("touchmove", function() {
   
    let scroll = $(this).scrollTop();
     if (scroll > heightPlaceTotal_centro) 
       $(this).animate({ scrollTop: 0 }, 0);
   
    
  });
  //
 
  $("#owl-demo").owlCarousel({
    autoHeight: true,
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

