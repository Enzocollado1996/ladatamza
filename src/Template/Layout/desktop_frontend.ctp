<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?= $this->Html->css('../assets/owl.carousel.min') ?>
    <?= $this->Html->css('../assets/owl.theme.desk') ?>
    <?= $this->Html->css('../assets/style.desk') ?>
    <?= $this->element('modals/socials') ?>
</head>
<body>
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
                        C79.2,367.2,72,331.2,82.8,291.6c7.2-25.2,18-43.2,39.6-54c21.6-10.8,43.2-18,64.8-18c7.2,0,10.8,0,18,0
                        C241.2,226.8,270,244.8,288,273.6z"/>
                </g>
                </svg>
<div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($articulos_general as $general) {?>

            <div class="item">
        
                 
            <?php if(!isset($general->titulo)):?>
            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $general->imagen->file_url . '/' . $general->imagen->filename, ['style'=> 'width:100%']);?>
            <?php else : ?> 
            <div class="share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $general->slug], true)?>', '', '<?=$general->titulo?>')"><?php echo $this->Html->image("../assets/images/share2.png", ['class' => 'share_url']) ?></div>
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
    </div>
                    <div class="header-notices">
                        <div>norte</div>
                        <div>centro</div>
                        <div>sur</div>
                    </div>
    <div class="noticias">
    
        <div class="sector">
            <?php foreach ($articulos_norte as $norte) :?>        
            <div class="container-noticia">
                  
            <?php if(!isset($norte->titulo)):?>
            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $norte->imagen->file_url . '/' . $norte->imagen->filename, ['style'=> 'width:100%']);?>
            <?php else : ?> 
            <div class="fecha"><?=$norte->publicado->i18nFormat('dd/MM/YYYY')?></div>
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
                    <h2 id="<?= $norte->id?>" onmouseover="barrido(<?=$norte->id ?>)" onmouseleave="barridoout(<?=$norte->id ?>)"><span></span><?php echo $norte->titulo?></h2>
                    <div class="texto">
                   
                     <?php echo $norte->texto; ?>
                    </div>
                    <div class="footer">
                    <?php echo $norte->palabras_claves?>
                    </div>
                </div>
                <?php endif ?> 
            </div>
            <?php endforeach ;?>
        </div>
        <div class="sector">
            <?php foreach ($articulos_centro as $centro) :?>   
            <div class="container-noticia">
            <?php if(!isset($centro->titulo)):?>
            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $centro->imagen->file_url . '/' . $centro->imagen->filename, ['style'=> 'width:100%']);?>
            <?php else : ?>   
            <div class="fecha"><?=$centro->publicado?></div>
             
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
                    <h2 id="<?= $centro->id?>" onmouseover="barrido(<?=$centro->id ?>)" onmouseleave="barridoout(<?=$centro->id ?>)"><span></span><?php echo $centro->titulo?></h2>
                    <div class="texto">
                    <?php echo $centro->texto?>
                    </div>
                    <div class="footer">
                    <?php echo $centro->palabras_claves?>
                    </div>
                </div>
                     <?php endif; ?>
                </div>
       
            
            <?php endforeach ;?>
        </div>
        <div class="sector">
 
            <?php foreach ($articulos_sur as $sur) :?>        
            <div class="container-noticia">
            
            <?php if(!isset($sur->titulo)):?>
            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $sur->imagen->file_url . '/' . $sur->imagen->filename, ['style'=> 'width:100%']);?>
            <?php else : ?>      
            <div class="fecha"><?=$sur->publicado?></div>
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
                    <h2 id="<?=$sur->id?>" onmouseover="barrido(<?=$sur->id?>)" onmouseleave="barridoout(<?=$sur->id ?>)"><span></span><?php echo $sur->titulo?></h2>
                    <div class="texto">
                    <?php echo $sur->texto?>
                    </div>
                    <div class="footer">
                    <?php echo $sur->palabras_claves?>
                    </div>
                </div>
                <?php endif ?> 
                </div>
              
            <?php endforeach ;?>
          
        </div>
     

    </div>
</body>
</html>
<style>

.logo{
    position:absolute;
    z-index: 100;
}
.share {
    position:absolute;
    bottom:300px;
    right:10px;
}
.logo a img{
    width:150px;
}
.heart{
    position: absolute;
    right: 10px;
    z-index: 16
}
.header-notices{
    display:grid;
    grid-template-columns: 33% 33% 33%;
    text-align:center
}
.noticias{
    display:grid;
    grid-template-columns: 33% 33% 33%;
    text-align:center;
    gap:10px;
}

</style>

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

</script> 