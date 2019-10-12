<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?= $this->Html->css('../assets/flipclock') ?>
    <?= $this->Html->css('../assets/style') ?>
    <?= $this->Html->css('../assets/owl.carousel.min') ?>
    <?= $this->Html->css('../assets/owl.theme.default') ?>
   
    <?= $this->element('modals/socials') ?>
    <?= $this->element('modals/search') ?>
  
    <?= $this->element('Frontend/header') ?>
    
</head>
<body>
    <?= $this->element('modals/publicidadPrincipal') ?>
    <?= $this->element('Frontend/menu') ?>
    <?= $this->element('modals/publicidadBoton') ?>
    <div class="containerScroller">
        <div class="slot_container">
            <!-- norte -->
            <div class="place norte">
                <?php foreach ($articulos_norte as $noticia_norte): ?>
                    <?php if(isset($noticia_norte->titulo)):?>
                    <div class="shadownews" onclick="gotodetail('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$noticia_norte->slug]) ?>')">
                            <div class="date"><?=$noticia_norte->publicado->i18nFormat('dd/MM/YYYY')?> </div>
                            <div class="title"><?=$noticia_norte->titulo?></div>
                            <div class="footer">
                                <div class="district"><?=$noticia_norte->palabras_claves?> </div>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    <?php else: ?>
                    <div class="shadownews empty">
                        <?php echo$this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $noticia_norte->imagen->file_url . '/' . $noticia_norte->imagen->filename, ['style'=> 'width:100%']);?>
                    </div>
                    <?php endif; ?>
                <?php endforeach;?>
                <div class="shadownews empty"></div>
            </div>
            <!-- centro -->
            <div class="place centro">
                <?php foreach ($articulos_centro as $noticia_centro): ?>
                    <?php if(isset($noticia_centro->titulo)):?>
                    <div class="shadownews center" onclick="gotodetail('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$noticia_centro->slug]) ?>')">
                            <div class="date"><?=$noticia_centro->publicado->i18nFormat('dd/MM/YYYY')?> </div>
                            <div class="title"><?=$noticia_centro->titulo?></div>
                            <div class="footer">
                                <div class="district"><?=$noticia_centro->palabras_claves?> </div>

                                <div class="clearfix"></div>
                            </div>
                    </div>
                    <?php else: ?>
                    <div class="shadownews center empty">
                        <?php echo$this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $noticia_centro->imagen->file_url . '/' . $noticia_centro->imagen->filename, ['style'=> 'width:100%']);?>
                    </div>
                    <?php endif; ?>
                <?php endforeach?>
                <div class="shadownews center empty"></div>
            </div>
            <!-- sur -->
            <div class="place sur">
                <?php foreach ($articulos_sur as $noticia_sur): ?>
                <?php if(isset($noticia_sur->titulo)):?>
                    <div class="shadownews" onclick="gotodetail('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$noticia_sur->slug]) ?>')">

                        <div class="date"><?=$noticia_sur->publicado->i18nFormat('dd/MM/YYYY')?></div>
                        <div class="title"><?=$noticia_sur->titulo?></div>
                        <div class="footer">
                            <div class="district"><?=$noticia_sur->palabras_claves?> </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="shadownews empty">
                        <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $noticia_sur->imagen->file_url . '/' . $noticia_sur->imagen->filename, ['style'=> 'width:100%']);?>
                    </div>
                    <?php endif; ?>
                <?php endforeach?>
             <div class="shadownews empty"></div>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
    <div class="divider"></div>
   
     <div class="container_clock">
         <div class="hrs"><span></span>20:00 hrs</div> 
         <div class="twoDots"><span></span><span></span></div>
        <div class="clock"></div> 
        <div class="resumen">RESUMEN</div>
        <div class="oVideo" onclick="openVideo()"></div>
    </div>
    <div class="divider"></div>
    <div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($articulos_general as $general) {?>
            <div class="item">
            <?php if(!isset($general->titulo)):?>
            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $general->imagen->file_url . '/' . $general->imagen->filename, ['style'=> 'width:100%']);?>
            <?php else : ?> 
            <div onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $general->slug], true)?>', '', '<?=$general->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => 'share_url']) ?></div>
            <?php
                if ($general->has('imagenes')) {
                    $imagen = $general->imagenes[0];
                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename);

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
    <div class="borde-amarillo">
    </div>
    <!-- <button id="asd" onclick="shareNew('laurl.com','laurl','test');">Compartir</button> -->
</body>

</html>
<script>

function gotodetail(url){
location.href = url
}
</script>
<?= $this->Html->script('../assets/js/jquery.min'); ?>
<?= $this->Html->script('../assets/js/slick.min'); ?>
<?= $this->Html->script('../assets/js/flipclock.min'); ?>
<?= $this->Html->script('../assets/js/functions'); ?>
<?= $this->Html->script('../assets/js/index'); ?>
<?= $this->Html->script('../assets/js/owl.carousel.min'); ?>
