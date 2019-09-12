<?php include('header.ctp'); ?>
<div class="container noticias interior-categoria">
    <div class="header-notices text-left">
        <?php echo $categoria;?>
    </div>
    <div class="flecha"></div>
    <?php foreach ($articulo_categoria as $key => $categoria) : 
        if($key == 6) {break;}?>
        <div class="container-categoria row margen-40"> 
            <div class="col-md-5" style="padding:0;">
                <?php if(!isset($categoria->titulo)):?>
                <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $categoria->imagen->file_url . '/' . $categoria->imagen->filename, ['style'=> 'width:100%']);?>
                <?php else : ?> 
                <div class="share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $categoria->slug], true)?>', '', '<?=$categoria->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => 'share_home_ncs']) ?></div>
                <?php if (count($categoria->imagenes) > 0) {
                    foreach ($categoria->imagenes as $imagen) {
                        if ($imagen->tipo == 'NOTICIA') {
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                        }
                    }
                        } else {
                    echo '<div class="banner-empty"></div>';
                        }
                    ?>
                    <div class="contenido-categoria col-md-7" onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$categorias->slug]) ?>')">
                    <div class="keyword"><?php echo $categorias->palabras_claves?></div>
                    <div id="<?= $categorias->id?>" class="titulo-nota-home">
                        <span></span><?php echo $categorias->titulo?>
                    </div>   
                </div>
                <?php endif ?> 
            </div> <!--END CONTAINER NOTICIAS-->
            <?php endforeach ;?>
            </div>
        </div>
        <a class="btn-amarillo btn-mas-noticias margen-b-40" onclick="categorias_page('<?=$page ?>')">ver +</a>
    </div>
</div>
<?= $this->Html->script('../assets/js/functions'); ?>
<?php include('categoria_sociales.ctp'); ?>
<?php include('footer.ctp'); ?>
