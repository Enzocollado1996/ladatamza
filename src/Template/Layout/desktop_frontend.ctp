<?php include('header_transparente.ctp'); ?>
<body>
<div class="share-show">
</div>
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($articulos_general as $key => $general) {?>
            <?php if($key == 5) {
                break;
            }
            ?>
            <div class="item text-center">
            <?php if(!isset($general->titulo)):?>
            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $general->imagen->file_url . '/' . $general->imagen->filename, ['style'=> 'width:100%']);?>
            <?php else : ?> 
            <div class="share hidden" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $general->slug], true)?>', '', '<?=$general->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => 'share_url_banner']) ?>
            </div>
            <div class="text-center contenedor-keyword-slider">
                <div class="keyword"><?=$general->palabras_claves?></div>
            </div>
                <?php
                if ($general->has('imagenes')) {
                    $imagen = $general->imagenes[0];
                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                    // echo '<div class="asd" style="background:url('.$this->Url->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename).')">';

                    } else {
                    echo '<div class="banner-empty"></div>';
                } //END if (count($general->imagenes) > 0)
                ?>
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
                    <div class="share btn-share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $general->slug], true)?>', '', '<?=$general->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => '']) ?>
                    </div>
                    <div class="container-noticia"> 
                        <?php 
                        if(!isset($general->titulo)):
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $general->imagen->file_url . '/' . $general->imagen->filename, ['style'=> 'width:100%']);
                        else : ?> 
                            <!--<div class="fecha"><?=$general->publicado->i18nFormat('dd/MM/YYYY')?></div>-->
                            <div class="contenedor-img-txt" id=<?= 'contenedor-img-txt-' . $general->id?>>
                                    <?php 
                                    if (count($general->imagenes) > 0) {
                                        foreach ($general->imagenes as $imagen) {
                                            if ($imagen->tipo == 'NOTICIA') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner imagen']);
                                            }
                                            if ($imagen->tipo == 'GIF') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner gif hidden']);
                                            }
                                        }
                                    }else{
                                        echo '<div class="banner-empty"></div>';
                                    } //END if (count($general->imagenes) > 0)
                                    ?>
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
                            <!--<div class="fecha"><?=$norte->publicado->i18nFormat('dd/MM/YYYY')?></div>-->
                            <div class="share-sector btn-share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $norte->slug], true)?>', '', '<?=$norte->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => '']) ?>
                            </div>
                            <div class="contenedor-img-txt" id=<?= 'contenedor-img-txt-' . $norte->id?>>
                                <div class="img-nota">
                                    <?php if (count($norte->imagenes) > 0) {
                                        foreach ($norte->imagenes as $imagen) {
                                            if ($imagen->tipo == 'NOTICIA') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner imagen']);
                                            }
                                            if ($imagen->tipo == 'GIF') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner gif hidden']);
                                            }
                                        }
                                    } else {
                                        echo '<div class="banner-empty"></div>';
                                    }
                                    ?>
                                </div>
                                <div class="icons-share">
                                    <a href="#fa"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#wh"><i class="fab fa-whatsapp"></i></a>
                                    <a href="#tw"><i class="fab fa-twitter"></i></a>
                                    <a href="#m"><i class="fas fa-envelope"></i></a>
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
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner imagen']);
                                            }
                                            if ($imagen->tipo == 'GIF') {
                                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner gif hidden']);
                                            }    
                                        }
                                    } else {
                                        echo '<div class="banner-empty"></div>';
                                    }
                                    ?>
                                </div>
                                <div class="icons-share">
                                    <a href="#fa"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#wh"><i class="fab fa-whatsapp"></i></a>
                                    <a href="#tw"><i class="fab fa-twitter"></i></a>
                                    <a href="#m"><i class="fas fa-envelope"></i></a>
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
                                                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner imagen']);
                                                }
                                                if ($imagen->tipo == 'GIF') {
                                                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner gif hidden']);
                                                }    
                                            }
                                        } else {
                                            echo '<div class="banner-empty"></div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="icons-share">
                                        <a href="#fa"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#wh"><i class="fab fa-whatsapp"></i></a>
                                        <a href="#tw"><i class="fab fa-twitter"></i></a>
                                        <a href="#m"><i class="fas fa-envelope"></i></a>
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
                echo '<a href="https://www.facebook.com/" target="_blank">' . $this->Html->image("../assets/images/fb-negro.svg") . '</a>';
                echo '<a href="https://www.instagram.com/?hl=es-la" target="_blank">' . $this->Html->image("../assets/images/instagram-negro.svg") . '</a>';
                echo '<a href="https://twitter.com/" target="_blank">' . $this->Html->image("../assets/images/tw-negro.svg") . '</a>';
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

$(document).ready(function(){
    $( "div.owl-item.active div.share").clone().appendTo(".share-show");
    $( ".share-show div" ).removeClass( "hidden" )
    var owl = $('#owl-demo');
    owl.owlCarousel();
    owl.on('changed.owl.carousel', function(event) {
        $(".share-show").empty();
        setTimeout ('shared_banner()', 100); 
    })
    alignContenido('.sector .contenido');
    alignContenido('.generales .contenido');
    gifOnHover();
    shareEffect();
})

function shared_banner(){
    $( "div.owl-item.active div.share").clone().appendTo(".share-show")
    $( ".share-show div" ).removeClass( "hidden" )
}
     
</script> 
<?= $this->Html->script('../assets/js/owl.carousel.min'); ?>