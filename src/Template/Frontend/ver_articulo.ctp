<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?=$this->Html->css('style_detalle.css')?>
    <?=$this->element('modals/socials')?>
    <div class="menu">
        <div class="weather">
            <div class="data">LA DATA MZA _</div>
            <div class="temp"></div>
            <img src="" alt="" width="24">
        </div>        
        <div class="logo"><img src="assets/images/logo.png" alt=""></div>
        <div class="social">
            <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <svg class="heart" onclick="socialModal();" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-heart">
                <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
            </svg>
        </div>
    </div>
</head>
<body>
    <?= $this->element('Frontend/menu') ?>
    <?php foreach ($articulos as $articulo): ?>
    <section>
        <div class="imagen">
        <?=$articulo->publicado->i18nFormat('dd/MM/YYYY')?>
        <?php
        if(count($articulo->imagenes) > 0){
            foreach($articulo->imagenes as $imagen){
                if($imagen->tipo == 'NOTICIA')
                {
                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class'=> 'banner']);
                }
            }            
        }
        ?>
        </div>
        <div class="info">
            <div class="titulo"><?=$articulo->titulo;?></div>
            <div class="cuerpo">
                <?php echo $articulo->texto; ?>
            </div>
        </div>
        <?php
        if(count($articulo->imagenes) > 0){
            foreach($articulo->imagenes as $imagen){
                if($imagen->tipo == 'PUBLICIDAD')
                {
                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class'=> 'banner']);
                }
            }            
        }
        ?>
    </section>
    <?php endforeach;?>
</body>
</html>
<script src="../../assets/js/jquery.min.js"></script>
<!-- <script src="../../assets/js/custom.js"></script> -->


<script>
    function positions(latitude,longitude){

var url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=07b60e14df693eebed986c32ce31914b`
$.get(url).then(
  data => {
    var grados = (Number(data.main.temp) - 273.15).toFixed(1);
    var iconname = translateWeather(data.weather[0].main)
    $(".weather").find('img').attr('src','../../assets/images/'+iconname+'.png')
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

$(document).ready(function() {


var watchID = navigator.geolocation.getCurrentPosition(function(position) {
  positions(position.coords.latitude, position.coords.longitude);
});

});
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

</script>