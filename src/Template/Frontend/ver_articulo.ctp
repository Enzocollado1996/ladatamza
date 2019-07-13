<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, height=device-height">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <?=$this->Html->css('../assets/style_detalle.css')?>
    <?=$this->element('modals/socials')?>
    <?=$this->element('modals/search')?>
    <?=$this->element('Frontend/header')?>
</head>
<body>

    <?=$this->element('Frontend/menu-detalle')?>
    <?php if (count($articulos) > 0): ?>
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
?>  <?php if ($articulo !== end($articulos)) {
    echo '<div class="scroller">' . $this->Html->image("../assets/images/arrow-bot.png") . '</div>';
} else {
    echo '<div class="scroller_back back">' . $this->Html->image("../assets/images/back.png") . '</div>';
}

?>
    </section>
    <?php endforeach;?>
    <?php else: ?>
    <div class="notFound">
    <svg   width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <span style="color:#000">No se encontraron resultados<span>
    </div>

    <?php endif?>
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
$("#target").submit(function(event) {
        event.preventDefault();
        let data = $(this).find('input').val()
        location.href = `${$(this).attr('action')}/${data}`
    });
});


</script>