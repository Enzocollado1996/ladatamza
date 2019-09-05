<body>

<div class="share-show">
</div>

    <?php include('header.ctp'); ?>
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
    <div class="container-sociales">
        <div class="container noticias ">
        <div class="row">
            <div class="sector col-md-4">
                <div class="header-notices-sociales">sociales</div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($articulos_sociales as $key => $sociales) :?>
            <div class="sector col-md-4">
                <div class="container-noticia"> 
                    <?php if(!isset($sociales->titulo)):?>
                        <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $sociales->imagen->file_url . '/' . $sociales->imagen->filename, ['style'=> 'width:100%']);?>
                    <?php else : ?> 
                    <!--<div class="fecha"><?=$sociales->publicado->i18nFormat('dd/MM/YYYY')?></div>-->
                        <?php if (count($sociales->imagenes) > 0) {
                            foreach ($sociales->imagenes as $imagen) {
                                if ($imagen->tipo == 'NOTICIA') {
                                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                                }
                            }
                        } else {
                            echo '<div class="banner-empty"></div>';
                        }
                    ?>
                    <div class="contenido-sociales" >
                        <div class="keyword"><?php echo $sociales->palabras_claves?></div>
                        <div id="<?= $sociales->id?>" class="titulo-nota-home">
                            <span></span><?php echo $sociales->titulo?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?> 
            <?php endforeach ;?>
            </div>
        </div>
    </div>
    <?php include('footer.ctp'); ?>




<?= $this->Html->script('../assets/js/jquery.min'); ?>
<?= $this->Html->script('../assets/js/slick.min'); ?>
<?= $this->Html->script('../assets/js/flipclock.min'); ?>
<?= $this->Html->script('../assets/js/functions'); ?>
<?= $this->Html->script('../assets/js/index'); ?>
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
