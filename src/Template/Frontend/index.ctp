<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/flipclock.css">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/owl.theme.default.css">
   
    <?= $this->element('modals/socials') ?>
    
    <div class="menu">
        <div class="weather">
            <div class="data">LA DATA MZA _</div>
            <div class="temp"></div>
            <img src="" alt="" width="24">         
        </div>
        <div class="logo">
            <a href="<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'index']) ?>">
                <img src="assets/images/logo.png" alt="">
            </a>
        </div>
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
    <?= $this->element('modals/publicidadPrincipal') ?>
    <?= $this->element('Frontend/menu') ?>

    <div class="containerScroller">
        <div class="slot_container">
            <!-- norte -->
            <div class="place norte">
                <?php foreach ($articulos_norte as $noticia_norte): ?>
                        <div class="shadownews" onclick="gotodetail('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$noticia_norte->slug]) ?>')">

                                <div class="date"><?=$noticia_norte->publicado->i18nFormat('dd/MM/YYYY')?> </div>
                                <div class="title"><?=$noticia_norte->titulo?></div>
                                <div class="footer">
                                    <div class="district"><?=$noticia_norte->palabras_claves?> </div>
                                    <div class="clearfix"></div>
                                </div>
                        </div>
                <?php endforeach;?>
                <div class="shadownews empty"></div>
            </div>
            <!-- centro -->
            <div class="place centro">
                <?php foreach ($articulos_centro as $noticia_centro): ?>
                    <div class="shadownews center" onclick="gotodetail('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$noticia_centro->slug]) ?>')">

                            <div class="date"><?=$noticia_centro->publicado->i18nFormat('dd/MM/YYYY')?> </div>
                            <div class="title"><?=$noticia_centro->titulo?></div>
                            <div class="footer">
                                <div class="district"><?=$noticia_centro->palabras_claves?> </div>

                                <div class="clearfix"></div>
                            </div>
                    </div>
                <?php endforeach?>
                <div class="shadownews empty"></div>
            </div>
            <!-- sur -->
            <div class="place sur">
                <?php foreach ($articulos_sur as $noticia_sur): ?>
                    <div class="shadownews" onclick="gotodetail('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$noticia_sur->slug]) ?>')">

                        <div class="date"><?=$noticia_sur->publicado->i18nFormat('dd/MM/YYYY')?></div>
                        <div class="title"><?=$noticia_sur->titulo?></div>
                        <div class="footer">
                            <div class="district"><?=$noticia_sur->palabras_claves?> </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endforeach?>
             <div class="shadownews empty"></div>

            </div>

        </div>
        <div class="overlay"></div>
    </div>
    <div class="divider"></div>
    <div class="container_clock">
        <div class="hrs"><span></span>20:00hrs. <br>Resumen</div>
        <div class="clock"></div>
    </div>
    <div class="divider"></div>
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($articulos_general as $general) {?>
            <div class="item">
            <?php
                if ($general->has('imagenes')) {
                    $imagen = $general->imagenes[0];
                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename);

                    } else {
                        echo '<img src="assets/images/test.jpg" alt="">';
                    }
                    ?>

                <div class="titulo">
                    <a href="<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$general->slug]) ?>">
                    <?=$general->titulo?>
                    </a>
                </div>
            </div>
        <?php }?>
    </div>
    <!-- <button id="asd" onclick="shareNew('laurl.com','laurl','test');">Compartir</button> -->
</body>

</html>
<script>

function gotodetail(url){
location.href = url
}
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/flipclock.min.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/index.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
