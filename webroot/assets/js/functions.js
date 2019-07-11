function positions(latitude,longitude){

  var url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=07b60e14df693eebed986c32ce31914b`
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

function socialModal(){
  $(".socialmedia_modal").addClass('active');
  $('html,body').css({
                  overflow: 'hidden'
              });
  $(".heart").css({
      "z-index": "2000"
  })
}
function cerrar(){

  $(".socialmedia_modal").removeClass('active');

  $('html,body').css({
                  overflow: 'auto'
              });
              $(".heart").css({
      "z-index": ""
  })


}
function cerrarPpal()
{
  $(".publicidad").hide();
  
  $('html,body').css({
    overflow: 'auto'
});
}
function goNews(url){
  location.href= url
}
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

