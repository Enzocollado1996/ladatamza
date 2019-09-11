<?php include('header.ctp'); ?>
<div class="container noticias generales">
    <div class="row">
         <div class="sector col-md-4">
            <div class="header-notices"><?php echo $categoria;?></div>
            <?php foreach ($articulo_categoria as $key => $categoria) :?>  
            <?php if($key == 6) {
                break;
            }
            ?>
      
            <div class="container-noticia"> 
                <?php if(!isset($categoria->titulo)):?>
                <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $categoria->imagen->file_url . '/' . $categoria->imagen->filename, ['style'=> 'width:100%']);?>
                <?php else : ?> 
                <div class="share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $categoria->slug], true)?>', '', '<?=$categoria->titulo?>')"><?php echo $this->Html->image("../assets/images/share2.png", ['class' => 'share_home_ncs']) ?></div>
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
                <div class="contenido" >
                    <div class="keyword"><?php echo $categoria->palabras_claves?></div>
                    <div id="<?= $categoria->id?>" class="titulo-nota-home">
                        <span></span><?php echo $categoria->titulo?>
                    </div>   
                </div>
                <?php endif ?> 
            </div> <!--END CONTAINER NOTICIAS-->
            <?php endforeach ;?>
            </div>
        </div>
    </div>
</div>
<?php include('categoria_sociales.ctp'); ?>
<?php include('footer.ctp'); ?>
