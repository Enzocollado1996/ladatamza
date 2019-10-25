<?php include('header_transparente.ctp'); ?>
<body>
<div class="share-show share-slider"></div>
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($articulos_general as $key => $general) {?>
            <?php if($key == 5) {
                break;
            }
            ?>
            <div class="item text-center" id=<?= 'item-' . $general->id?>> 
                <?php if(!isset($general->titulo)):?>
                    <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $general->imagen->file_url . '/' . $general->imagen->filename, ['style'=> 'width:100%']);?>
                <?php else : ?> 
                    <div class="share hidden share_url_banner btn-share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $general->slug], true)?>', '', '<?=$general->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => 'item-' . $general->id]) ?>
                    <img src="/img/../assets/images/close_negro.svg" class="ico-close" alt="">
                    </div>
                    <div class="text-center contenedor-keyword-slider">
                        <div class="keyword"><?=$general->palabras_claves?></div>
                    </div>
                    <div class="contenedor-slider contenedor-img-txt" id=<?= 'contenedor-img-txt-' . $general->id?>>
                        <div class="img-nota">
                            <?php
                            if ($general->has('imagenes')) {
                                $imagen = $general->imagenes[0];
                                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                            } //END if (count($general->imagenes) > 0)
                            ?>
                        </div>
                        <div class="icons-share">
							<a onclick="compartirnota('<?= $general->slug ?>', 'facebook')"><i class="fab fa-facebook-f"></i></a>
							<a onclick="compartirnota('<?= $general->slug ?>', 'wsp')"><i class="fab fa-whatsapp"></i></a>
							<a onclick="compartirnota('<?= $general->slug ?>', 'twitter')"><i class="fab fa-twitter"></i></a>
							<a onclick="compartirnota('<?= $general->slug ?>', 'mailito')"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                    <!--<div class="keyword"><?php echo 'Palabra Clave123';//$general->palabras_claves;?></div>-->
                    <div class="titulo">
                        <div onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$general->slug]) ?>')">
                        <?=$general->titulo?>
                        </div>
                    </div>
                    <?php endif?>
            </div>
        <?php }?>
    </div><!--END owl-demo-->
    <div class="container-fluid noticias generales">
        <?php 
        foreach ($articulos_general as $key => $general) :
            if($key >= 5 && $key <= 7):?>
                <div class="col-md-4 col-sm-4 padding-five">
                    <div class="container-noticia" id=<?= 'nota-' . $general->id?>> 
                        <?php 
                        if(!isset($general->titulo)):
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $general->imagen->file_url . '/' . $general->imagen->filename, ['style'=> 'width:100%']);
                        else : ?> 
                            <div class="share btn-share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $general->slug], true)?>', '', '<?=$general->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => '']) ?>
                            </div>
                            <!--<div class="fecha"><?=$general->publicado->i18nFormat('dd/MM/YYYY')?></div>-->
                            <div class="contenedor-img-txt" id=<?= 'contenedor-img-txt-' . $general->id?>>
                                <div class="img-nota">
                                    <?php 
                                    if (count($general->imagenes) > 0) {
                                        foreach ($general->imagenes as $imagen) {
                                            if ($imagen->tipo == 'NOTICIA') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota banner imagen']);
                                            }
                                            if ($imagen->tipo == 'GIF') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota banner gif hidden']);
                                            }
                                        }
                                    }else{
                                        echo '<div class="banner-empty"></div>';
                                    } //END if (count($general->imagenes) > 0)
                                    ?>
                                </div>
                                <div class="icons-share">
									<a onclick="compartirnota('<?= $general->slug ?>', 'facebook')"><i class="fab fa-facebook-f"></i></a>
									<a onclick="compartirnota('<?= $general->slug ?>', 'wsp')"><i class="fab fa-whatsapp"></i></a>
									<a onclick="compartirnota('<?= $general->slug ?>', 'twitter')"><i class="fab fa-twitter"></i></a>
									<a onclick="compartirnota('<?= $general->slug ?>', 'mailito')"><i class="fas fa-envelope"></i></a>
                                </div>
                                <div class="contenido" onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$general->slug]) ?>')" >
                                    <div id="<?= $general->id?>" class="titulo-nota-home"><?php echo $general->titulo?></div>
                                </div>
                            </div>
                        <?php endif;//END if(!isset($general->titulo)):?>
                    </div>
                </div>
                <?php endif; //END if($key >= 5 && $key <= 7):
        endforeach ;?>
    </div><!--End container noticias-->
    <div class="container noticias noticias-sector">
        <div class="row">
            <div class="sector col-sm-4 col-md-4">
                <div class="header-notices text-center">norte</div>
                <?php 
                foreach ($articulos_norte as $key => $norte) :
                    if($key == 3) {break;}?>
                    <div class="container-noticia" id=<?= 'nota-' . $norte->id?>> 
                        <?php if(!isset($norte->titulo)):?>
                        <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $norte->imagen->file_url . '/' . $norte->imagen->filename, ['style'=> 'width:100%']);?>
                        <?php else : ?> 
                            <div class="share-sector btn-share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $norte->slug], true)?>', '', '<?=$norte->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => '']) ?>
                            </div>
                            <div class="contenedor-img-txt" id=<?= 'contenedor-img-txt-' . $norte->id?>>
                                <div class="img-nota">
                                    <?php if (count($norte->imagenes) > 0) {
                                        foreach ($norte->imagenes as $imagen) {
                                            if ($imagen->tipo == 'NOTICIA') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota-sector banner imagen']);
                                            }
                                            if ($imagen->tipo == 'GIF') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota-sector banner gif hidden']);
                                            }
                                        }
                                        } else {
                                            echo '<div class="banner-empty"></div>';
                                        }
                                ?>
                            </div>
                            <div class="icons-share">
									<a onclick="compartirnota('<?= $norte->slug ?>', 'facebook')"><i class="fab fa-facebook-f"></i></a>
									<a onclick="compartirnota('<?= $norte->slug ?>', 'wsp')"><i class="fab fa-whatsapp"></i></a>
									<a onclick="compartirnota('<?= $norte->slug ?>', 'twitter')"><i class="fab fa-twitter"></i></a>
									<a onclick="compartirnota('<?= $norte->slug ?>', 'mailito')"><i class="fas fa-envelope"></i></a>
                            </div>
                            <div class="contenido" onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$norte->slug]) ?>')" >
                                <div class="keyword"><?php echo $norte->palabras_claves?></div>
                                <div id="<?= $norte->id?>" class="titulo-nota-home">
                                    <?php echo $norte->titulo?>
                                </div>   
                            </div>
                            <?php endif ?> 
                        </div><!--END contenedor-img-txt-->
                    </div> <!--END CONTAINER NOTICIAS-->
                <?php endforeach ;?>
                <div class="text-center">
                    <a class="btn-amarillo btn-mas-noticias margen-b-40" href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'categoria', 'norte'], true)?>">+ noticias</a>
                </div>
            </div>
            <div class="sector col-sm-4 col-md-4">
                <div class="header-notices text-center">centro</div>
                <?php foreach ($articulos_centro as $key => $centro) :?>   
                    <?php if($key == 3) {
                        break;
                    }
                    ?>
                    <div class="container-noticia" id=<?= 'nota-' . $centro->id?>>
                        <?php if(!isset($centro->titulo)):?>
                        <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $centro->imagen->file_url . '/' . $centro->imagen->filename, ['style'=> 'width:100%']);?>
                        <?php else : ?>   
                        <!--<div class="fecha"><?=$centro->publicado?></div>-->
                            <div class="share-sector btn-share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $centro->slug], true)?>', '', '<?=$centro->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => '']) ?>
                            </div>
                            <div class="contenedor-img-txt" id=<?= 'contenedor-img-txt-' . $centro->id?>>
                                <div class="img-nota">
                                    <?php if (count($centro->imagenes) > 0) {
                                        foreach ($centro->imagenes as $imagen) {
                                            if ($imagen->tipo == 'NOTICIA') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota-sector banner imagen']);
                                            }
                                            if ($imagen->tipo == 'GIF') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota-sector banner gif hidden']);
                                            }    
                                        }
                                    } else {
                                        echo '<div class="banner-empty"></div>';
                                    }
                                    ?>
                                </div>
                                <div class="icons-share">
									<a onclick="compartirnota('<?= $centro->slug ?>', 'facebook')"><i class="fab fa-facebook-f"></i></a>
									<a onclick="compartirnota('<?= $centro->slug ?>', 'wsp')"><i class="fab fa-whatsapp"></i></a>
									<a onclick="compartirnota('<?= $centro->slug ?>', 'twitter')"><i class="fab fa-twitter"></i></a>
									<a onclick="compartirnota('<?= $centro->slug ?>', 'mailito')"><i class="fas fa-envelope"></i></a>
                                </div>
                                <div class="contenido" onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$centro->slug]) ?>')" >
                                    <div class="keyword"><?php echo $centro->palabras_claves?></div>
                                    <div id="<?= $centro->id?>" class="titulo-nota-home"><span></span><?php echo $centro->titulo?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach ;?>
                <div class="text-center">
                    <a class="btn-amarillo btn-mas-noticias margen-b-40" href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'categoria', 'centro'], true)?>">+ noticias</a>
                </div>
            </div>
            <div class="sector col-sm-4 col-md-4">
                <div class="header-notices text-center">sur</div>
                    <?php foreach ($articulos_sur as $key => $sur) :?>        
                        <?php if($key == 3) {
                            break;
                        }
                        ?>
                        <div class="container-noticia" id=<?= 'nota-' . $sur->id?>>
                            <?php if(!isset($sur->titulo)):?>
                                <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $sur->imagen->file_url . '/' . $sur->imagen->filename, ['style'=> 'width:100%']);?>
                            <?php else : ?>      
                                <!--<div class="fecha"><?=$sur->publicado?></div>-->
                                <div class="share-sector btn-share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $sur->slug], true)?>', '', '<?=$sur->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => '']) ?></div>
                                <div class="contenedor-img-txt" id=<?= 'contenedor-img-txt-' . $sur->id?>>
                                    <div class="img-nota">
                                        <?php if (count($sur->imagenes) > 0) {
                                            foreach ($sur->imagenes as $imagen) {
                                                if ($imagen->tipo == 'NOTICIA') {
                                                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota-sector banner imagen']);
                                                }
                                                if ($imagen->tipo == 'GIF') {
                                                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota-sector banner gif hidden']);
                                                }    
                                            }
                                        } else {
                                            echo '<div class="banner-empty"></div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="icons-share">
										<a onclick="compartirnota('<?= $sur->slug ?>', 'facebook')"><i class="fab fa-facebook-f"></i></a>
										<a onclick="compartirnota('<?= $sur->slug ?>', 'wsp')"><i class="fab fa-whatsapp"></i></a>
										<a onclick="compartirnota('<?= $sur->slug ?>', 'twitter')"><i class="fab fa-twitter"></i></a>
										<a onclick="compartirnota('<?= $sur->slug ?>', 'mailito')"><i class="fas fa-envelope"></i></a>
                                    </div>
                                     <div class="contenido" onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$sur->slug]) ?>')">
                                        <div class="keyword"><?php echo $sur->palabras_claves?></div>
                                        <div id="<?=$sur->id?>" class="titulo-nota-home"><span></span><?php echo $sur->titulo?></div>
                                    </div>
                                </div> <!--END contenedor-img-txt-->
                            <?php endif ?> 
                        </div>
                    <?php endforeach ;?>
                <div class="text-center">
                    <a class="btn-amarillo btn-mas-noticias margen-b-40" href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'categoria', 'sur'], true)?>">+ noticias</a>
                </div>
            </div>
            <div class="social-sticky">
                <?php
                echo '<a href="https://www.facebook.com/Ladata-Mendoza-2451654124872948" target="_blank">' . $this->Html->image("../assets/images/fb-negro.svg") . '</a>';
                echo '<a href="https://instagram.com/ladatamza" target="_blank">' . $this->Html->image("../assets/images/instagram-negro.svg") . '</a>';
                echo '<a href="https://twitter.com/LADATA5" target="_blank">' . $this->Html->image("../assets/images/tw-negro.svg") . '</a>';
                ?>
            </div>
        </div> <!--END ROW-->
    </div> <!--END CONTAINER NOTICIAS-->
    <?php include('categoria_sociales.ctp'); ?>
    <?php include('footer.ctp'); ?>


 <script>
function generales(url){
    location.href = url
}

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

 function sliderShareEffect(){
    $('.share_url_banner').click(function(){
        var $notaActual = '#' + $('.share_url_banner img').attr('class');
 
        if ($($notaActual +  ' .btn-share').hasClass("close-share") == false){
                $($notaActual + ' .img-nota').addClass('hover-yellow');
                $('.ico-close').show();
                $($notaActual + '  .btn-share').addClass('close-share');
                $($notaActual + '  .icons-share').fadeIn(500);
        }else{
            $($notaActual + ' .img-nota').removeClass('hover-yellow');
            $('.ico-close').hide();
            $($notaActual + '  .btn-share').removeClass('close-share');
            $($notaActual + '  .icons-share').hide();
        }
    })
}
 
function hideSliderShareEffect(){
    $('#owl-demo .img-nota').removeClass('hover-yellow');
    $('.ico-close').hide();
    $('#owl-demo .btn-share').removeClass('close-share');
    $('#owl-demo .icons-share').hide();
}

$(document).ready(function(){
    $( "div.owl-item.active div.share").clone().appendTo(".share-show");
    $( ".share-show div" ).removeClass( "hidden" )
    var owl = $('#owl-demo');
    owl.owlCarousel();
    owl.on('changed.owl.carousel', function(event) {
        $(".share-show").empty();
        setTimeout ('shared_banner()', 100);
        setTimeout ('sliderShareEffect()', 100);
        setTimeout ('hideSliderShareEffect()', 100); 
    })
    alignContenido('.sector .contenido');
    alignContenido('.generales .contenido');
    alignContenido('.container-sociales .contenido');
    gifOnHover();
    shareEffect('.container-noticia');
    sliderShareEffect();
    $('.ico-close').hide();
})

$(window).load(function(){
 alignContenido('.imagen-nota');
 alignContenido('.imagen-nota-sector');
})

function shared_banner(){
    $( "div.owl-item.active div.share").clone().appendTo(".share-show")
    $( ".share-show div" ).removeClass( "hidden" )
}
     
</script> 
<?= $this->Html->script('../assets/js/owl.carousel.min'); ?>