<body>
<<<<<<< HEAD

<div class="share-show">
</div>
<div class="logo">   <a href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'index'])?>">
                <?php echo $this->Html->image("../assets/images/logo.svg"); ?>
            </a></div>
            <svg class="heart" onclick="socialModal();"  width="26" height="26" version="1.2" baseProfile="tiny" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    x="0px" y="0px" width="612px" height="792px" viewBox="0 0 612 792" xml:space="preserve">
                <g id="Capa_1_1_">
                </g>
                <g id="Object">
                    <path id="XMLID_754_" fill="#211915" stroke="#211915" stroke-miterlimit="10" d="M579.6,302.4v-7.2c0-3.6,0-10.8-3.6-14.4
                        c-10.8-50.4-43.2-82.8-93.6-100.8c-21.601-7.2-39.601-10.8-61.2-10.8c-25.2,0-50.4,3.6-75.601,18c-14.399,10.8-28.8,18-39.6,32.4
                        c-25.2-25.2-57.6-43.2-97.2-46.8c-18-3.6-39.6,0-61.2,3.6c-32.4,7.2-57.6,18-75.6,39.6c-21.6,18-36,46.8-39.6,75.6L28.8,306v28.8
                        v3.6c0,28.8,10.8,57.6,28.8,86.4s39.6,57.601,72,90c21.6,21.601,43.2,43.2,64.8,64.8l43.2,43.2c10.8,10.8,21.6,21.601,32.4,32.4
                        s21.6,14.399,32.4,14.399c10.8,0,21.6-3.6,32.399-14.399c7.2-7.2,18-14.4,25.2-25.2l46.8-43.2c21.601-21.6,46.8-46.8,68.4-68.399
                        c32.399-32.4,54-61.2,72-90c7.2-14.4,21.6-36,25.2-61.2c0-7.2,3.6-14.4,3.6-18v-10.8L579.6,302.4z M288,273.6l3.6,7.2l0,0l7.2,7.2
                        l0,0l10.8,10.8l14.4-25.2c18-25.2,43.2-43.2,75.6-50.4c36-7.2,68.4,0,97.2,21.6c18,10.8,28.8,28.8,32.4,54
                        c3.6,18,3.6,39.6-3.601,57.6c-3.6,14.4-10.8,28.8-18,39.6c-14.399,25.2-36,50.4-64.8,79.2c-21.6,21.6-43.2,43.2-64.8,61.2l-36,36
                        c-3.6,10.8-10.8,18-18,25.199L309.6,612l-3.6,3.6l-3.6-3.6l-36-36c-32.4-32.4-64.8-64.8-100.8-97.2c-25.2-25.2-46.8-54-64.8-79.2
                        C79.2,367.2,72,331.2,82.8,4291.6c7.2-25.2,18-43.2,39.6-54c21.6-10.8,43.2-18,64.8-18c7.2,0,10.8,0,18,0
                        C241.2,226.8,270,244.8,288,273.6z"/>
                </g>
                </svg>
=======
    <?php include('header.ctp'); ?>
>>>>>>> 421cd22096e26c3d224a326523bec775e6d2617a
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($articulos_general as $key => $general) {?>
            <?php if($key == 5) {
                break;
            }
            ?>
            <div class="item">
            <?php if(!isset($general->titulo)):?>
            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $general->imagen->file_url . '/' . $general->imagen->filename, ['style'=> 'width:100%']);?>
            <?php else : ?> 
            <div class="share hidden" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $general->slug], true)?>', '', '<?=$general->titulo?>')"><?php echo $this->Html->image("../assets/images/share2.png", ['class' => 'share_url_banner']) ?></div>
            <?php
                if ($general->has('imagenes')) {
                    $imagen = $general->imagenes[0];
                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename);
                    // echo '<div class="asd" style="background:url('.$this->Url->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename).')">';

                    } else {
                        echo '<img src="assets/images/test.jpg" alt="">';
                    }
                    ?>

                <div class="titulo">
                    <div onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$general->slug]) ?>')">
                    <?=$general->titulo?>
                    </div>
                </div>
                <?php endif?>
            </div>
        <?php }?>
    </div><!--END owl-demo-->
    <div class="container noticias">
        <?php foreach ($articulos_general as $key => $general) :?>
            <?php if($key >= 5 && $key <= 7){?>
                <div class="sector col-md-4">
                    <div class="container-noticia"> 
                        <?php if(!isset($general->titulo)):?>
                            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $general->imagen->file_url . '/' . $general->imagen->filename, ['style'=> 'width:100%']);?>
                        <?php else : ?> 
                        <!--<div class="fecha"><?=$general->publicado->i18nFormat('dd/MM/YYYY')?></div>-->
                            <?php if (count($general->imagenes) > 0) {
                                foreach ($general->imagenes as $imagen) {
                                    if ($imagen->tipo == 'NOTICIA') {
                                        echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                                    }
                                }
                            } else {
                                echo '<div class="banner-empty"></div>';
                            }
                        ?>
                        <div class="contenido" >
                            <div class="keyword"><?php echo $general->palabras_claves?></div>
                            <div id="<?= $general->id?>" class="titulo-nota-home">
                                <span></span><?php echo $general->titulo?>
                            </div>
                        </div>
                    </div>
                    <button>+ noticias</button>
                </div>
                <?php endif ?> 
            <?php } ?> 
        <?php endforeach ;?>
    </div>
    <div class="container noticias generales">
        <div class="row">
            <div class="sector col-md-4">
                <div class="header-notices">norte</div>
                <?php foreach ($articulos_norte as $key => $norte) :?>  
                <?php if($key == 3) {
                    break;
                }
                ?>
      
                <div class="container-noticia"> 
                    <?php if(!isset($norte->titulo)):?>
                    <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $norte->imagen->file_url . '/' . $norte->imagen->filename, ['style'=> 'width:100%']);?>
                    <?php else : ?> 
                    <!--<div class="fecha"><?=$norte->publicado->i18nFormat('dd/MM/YYYY')?></div>-->
                    <?php if (count($norte->imagenes) > 0) {
                        foreach ($norte->imagenes as $imagen) {
                            if ($imagen->tipo == 'NOTICIA') {
                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                            }
                        }
                    } else {
                        echo '<div class="banner-empty"></div>';
                    }
                    ?>
                        
                    <div class="contenido" >
                        <div class="keyword"><?php echo $norte->palabras_claves?></div>
                        <div id="<?= $norte->id?>" class="titulo-nota-home">
                            <span></span><?php echo $norte->titulo?>
                        </div>   
                    </div>
                    <?php endif ?> 
                </div> <!--END CONTAINER NOTICIAS-->
                <?php endforeach ;?>
                <div class="text-center">
                    <a class="btn-amarillo btn-mas-noticias margen-b-40" href="#">+ noticias</a>
                </div>
            </div>
            <div class="sector col-md-4">
                <div class="header-notices">centro</div>
                <?php foreach ($articulos_centro as $key => $centro) :?>   
                <?php if($key == 3) {
                    break;
                }
                ?>

                <div class="container-noticia">
                <?php if(!isset($centro->titulo)):?>
                <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $centro->imagen->file_url . '/' . $centro->imagen->filename, ['style'=> 'width:100%']);?>
                <?php else : ?>   
                <!--<div class="fecha"><?=$centro->publicado?></div>-->
                 
                <?php if (count($centro->imagenes) > 0) {
                    foreach ($centro->imagenes as $imagen) {
                        if ($imagen->tipo == 'NOTICIA') {
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                        }
                    }
                } else {
                    echo '<div class="banner-empty"></div>';
                }
                ?>
                        <div class="contenido">
                        <div class="keyword"><?php echo $centro->palabras_claves?></div>
                        <div id="<?= $centro->id?>" class="titulo-nota-home"><span></span><?php echo $centro->titulo?></div>
                        
                        
                    </div>
                         <?php endif; ?>
                    </div>
           
                
                <?php endforeach ;?>
                <div class="text-center">
                    <a class="btn-amarillo btn-mas-noticias margen-b-40" href="#">+ noticias</a>
                </div>
            </div>
            <div class="sector col-md-4">
                <div class="header-notices">sur</div>
                <?php foreach ($articulos_sur as $key => $sur) :?>        
                <?php if($key == 3) {
                    break;
                }
                ?>


                <div class="container-noticia">
                
                <?php if(!isset($sur->titulo)):?>
                <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $sur->imagen->file_url . '/' . $sur->imagen->filename, ['style'=> 'width:100%']);?>
                <?php else : ?>      
                <!--<div class="fecha"><?=$sur->publicado?></div>-->
                <?php if (count($sur->imagenes) > 0) {
                    foreach ($sur->imagenes as $imagen) {
                        if ($imagen->tipo == 'NOTICIA') {
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                        }
                    }
                } else {
                    echo '<div class="banner-empty"></div>';
                }
                ?>
                        <div class="contenido">
                        <div class="keyword"><?php echo $sur->palabras_claves?></div>
                        <div id="<?=$sur->id?>" class="titulo-nota-home"><span></span><?php echo $sur->titulo?></div>

                    </div>
                    <?php endif ?> 
                    </div>
                  
                <?php endforeach ;?>
                <div class="text-center">
                    <a class="btn-amarillo btn-mas-noticias margen-b-40" href="#">+ noticias</a>
                </div>
            </div>
            <div class="social-sticky">
                <?php
                echo '<a href="https://www.facebook.com/" target="_blank">' . $this->Html->image("../assets/images/fb-negro.svg") . '</a>';
                echo '<a href="https://www.instagram.com/?hl=es-la" target="_blank">' . $this->Html->image("../assets/images/instagram-negro.svg") . '</a>';
                echo '<a href="https://twitter.com/" target="_blank">' . $this->Html->image("../assets/images/tw-negro.svg") . '</a>';
                ?>
            </div>
        </div> <!--END ROW-->
    </div> <!--END CONTAINER NOTICIAS-->
    <?php include('footer.ctp'); ?>




<?= $this->Html->script('../assets/js/jquery.min'); ?>
<?= $this->Html->script('../assets/js/slick.min'); ?>
<?= $this->Html->script('../assets/js/flipclock.min'); ?>
<?= $this->Html->script('../assets/js/functions'); ?>
<?= $this->Html->script('../assets/js/index'); ?>
<<<<<<< HEAD
<?= $this->Html->script('../assets/js/owl.carousel.min'); ?>
 <script>
    function barrido(uid){
        
        $("#"+uid).find('span').animate({width:'100%'})
        // })
    }
    function barridoout(uid){
        
        $("#"+uid).find('span').animate({width:'0%'})
    }
        // $(".unique").on('mouseover',()=>{
        
        // let id = $(".unique").attr('id')
        // console.log(id)
        // $("#"+id).find('span').animate({width:'100%'})
        // })

        // $(".unique").on('mouseleave',()=>{


        //     let id = $(".unique").attr('id')
            
        //     $("#"+id).find('span').animate({width:'0%'})


        //     })
    //  })
    //Función que detecta cuando se mueve el banner

$(document).ready(function(){
    $( "div.owl-item.active div.share").clone().appendTo(".share-show");
    $( ".share-show div" ).removeClass( "hidden" )
    var owl = $('#owl-demo');
    owl.owlCarousel();
    owl.on('changed.owl.carousel', function(event) {
        console.log("ADSASD");
        $(".share-show").empty();
        setTimeout ('shared_banner()', 100); 

    })
})
function shared_banner(){
    $( "div.owl-item.active div.share").clone().appendTo(".share-show")
    $( ".share-show div" ).removeClass( "hidden" )
}
</script> 
=======
<?= $this->Html->script('../assets/js/owl.carousel.min'); ?>
>>>>>>> 421cd22096e26c3d224a326523bec775e6d2617a
