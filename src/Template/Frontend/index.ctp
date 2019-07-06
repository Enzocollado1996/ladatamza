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
    <div class="socialmedia_modal">

        <div class="content-sm">
            <div class="social-name">
              <span><img src="assets/images/fb.png" alt="">
              ladatamendoza</span>
              <div class="linea"></div>
            </div>


            <div class="social-name">
              <span><img src="assets/images/insta.png" alt="">
              ladatamendoza</span>
              <div class="linea"></div>
            </div>
            <div class="social-name">
              <span><img src="assets/images/tw.png" alt="">
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
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-cloud-snow">
                <path d="M20 17.58A5 5 0 0 0 18 8h-1.26A8 8 0 1 0 4 16.25"></path>
                <line x1="8" y1="16" x2="8" y2="16"></line>
                <line x1="8" y1="20" x2="8" y2="20"></line>
                <line x1="12" y1="18" x2="12" y2="18"></line>
                <line x1="12" y1="22" x2="12" y2="22"></line>
                <line x1="16" y1="16" x2="16" y2="16"></line>
                <line x1="16" y1="20" x2="16" y2="20"></line>
            </svg> -->
        </div>
        <div class="logo"> <img src="assets/images/logo.png" alt=""></div>
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


    <div class="header-notices">
        <div class="region">NORTE</div>
        <div class="region">CENTRO</div>
        <div class="region">SUR</div>
    </div>

    <div class="containerScroller">
        <div class="slot_container">
            <!-- norte -->
            <div class="place norte">
                <?php foreach ($articulos_norte as $noticia_norte): ?>
                        <div class="shadownews">

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
                    <div class="shadownews center">

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
                    <div class="shadownews">

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
                if($general->has('imagenes')){
                    $imagen = $general->imagenes[0];
                     echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url.'/'.$imagen->filename);
                    
                }
                else{
                   echo '<img src="assets/images/test.jpg" alt="">';
                }
                ?>
          
                <div class="titulo">
                    <?=$general->titulo?>
                </div>
            </div>
        <?php }?>
    </div>
    <!-- <button id="asd" onclick="shareNew('laurl.com','laurl','test');">Compartir</button> -->
</body>

</html>
<script>

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
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/flipclock.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
