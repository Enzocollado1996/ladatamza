<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:image" content="http://euro-travel-example.com/thumbnail.jpg">
    <title>Document</title>

    <?=$this->Html->css('../assets/style_detalle.css')?>
    <div class="socialmedia_modal">

        <div class="content-sm">
            <div class="social-name">
              <span><?php echo $this->Html->image("../assets/images/fb.png"); ?>
              ladatamendoza</span>
              <div class="linea"></div>
            </div>


            <div class="social-name">
              <span><?php echo $this->Html->image("../assets/images/insta.png"); ?>
              ladatamendoza</span>
              <div class="linea"></div>
            </div>
            <div class="social-name">
              <span><?php echo $this->Html->image("../assets/images/tw.png"); ?>
              ladatamendoza</span>
            </div>
        </div>
        <svg  onclick="cerrar();"class="close" width="64" version="1.1" xmlns="http://www.w3.org/2000/svg" height="64" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
        <g>
            <path fill="#feee00" d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"/>
        </g>
        </svg>

    </div>
    <div class="menu">
        <div class="weather">
            <div class="data">LA DATA MZA _</div>
            <div class="temp"></div>
            <img src="" alt="" width="24">
        </div>
        <div class="logo">   <a href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'index'])?>">
                <?php echo $this->Html->image("../assets/images/logo.png"); ?>
            </a></div>
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

    <?=$this->element('Frontend/menu-detalle')?>
    <?php foreach ($articulos as $articulo): ?>
    <section>
        <div class="imagen">
        <div class="time"><?=$articulo->publicado->i18nFormat('dd/MM/YYYY')?></div>
        <?php
if (count($articulo->imagenes) > 0) {
    foreach ($articulo->imagenes as $imagen) {
        if ($imagen->tipo == 'NOTICIA') {
            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
        }
    }
} else {
    echo '<div class="banner-empty"></div>';
}
?>
        </div>
        <div class="info">
            <div class="titulo"><?=$articulo->titulo;?></div>
            <div class="share">
                <div onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $articulo->slug], true)?>', '', '<?=$articulo->titulo?>')"><?php echo $this->Html->image("../assets/images/share.png", ['class' => 'share_url']) ?></div>
                <?php echo $this->Html->image("../assets/images/back.png", ['class' => 'back']) ?>

                </div>
            <div class="cuerpo">

                <?php echo $articulo->texto; ?>
            </div>
        </div>
        <?php
if (count($articulo->imagenes) > 0) {
    foreach ($articulo->imagenes as $imagen) {
        if ($imagen->tipo == 'PUBLICIDAD') {
            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
        }
    }
}
?>
    </section>
    <?php endforeach;?>
</body>
</html>
<?=$this->Html->script('../assets/js/jquery.min');?>
<?=$this->Html->script('../assets/js/functions');?>

<script>


$(document).ready(function() {

$('.back').on('click',()=>{
    location.href = '/'
})

var watchID = navigator.geolocation.getCurrentPosition(function(position) {
  positions(position.coords.latitude, position.coords.longitude);
});

});


</script>