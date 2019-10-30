<?php include('header.ctp'); ?>
<div class="container noticias interior-categoria">
    <div class="header-notices text-left">
        <?php echo $categoria;?>
    </div>
    <div class="flecha"></div>
    <?php foreach ($articulo_categoria as $key => $categoria) : 
        if($key == 6) {break;}?>
        <div class="container-categoria row margen-40"> 
            <div class="col-md-5 img-nota-categoria" id=<?= 'nota-' . $categoria->id?>>
                <?php if(!isset($categoria->titulo)):?>
                    <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $categoria->imagen->file_url . '/' . $categoria->imagen->filename, ['style'=> 'width:100%']);?>
                <?php else : ?> 
                    <div class="share btn-share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $categoria->slug], true)?>', '', '<?=$categoria->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => 'share_home_ncs']) ?></div>
                    <div class="contenedor-img-txt" id=<?= 'contenedor-img-txt-' . $categoria->id?>>
                        <div class="img-nota">
                            <?php if (count($categoria->imagenes) > 0) {
                                foreach ($categoria->imagenes as $imagen) {
                                    if ($imagen->tipo == 'NOTICIA') {
                                        echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                                    }
                                    if ($imagen->tipo == 'GIF') {
                                        echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner hidden']);
                                    }
                                }
                            } else {
                                echo '<div class="banner-empty"></div>';
                            }?>
                        </div>
                    </div>
                <?php endif; ?> 
                <div class="icons-share">
                    <a onclick="compartirnota('<?= $categoria->slug ?>', 'facebook')"><i class="fab fa-facebook-f"></i></a>
                    <a onclick="compartirnota('<?= $categoria->slug ?>', 'wsp')"><i class="fab fa-whatsapp"></i></a>
                    <a onclick="compartirnota('<?= $categoria->slug ?>', 'twitter')"><i class="fab fa-twitter"></i></a>
                    <a onclick="compartirnota('<?= $categoria->slug ?>', 'mailito')"><i class="fas fa-envelope"></i></a>
                </div>
            </div><!--END col-md-5-->

            <div class="contenido-categoria col-md-7"onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$categoria->slug]) ?>')" >
                <div class="keyword"><?php echo $categoria->palabras_claves?></div>
                <div id="<?= $categoria->id?>" class="titulo-nota-categoria">
                    <span></span><?php echo $categoria->titulo?>
                </div>
                <div class="descripcion-articulo">
                    <?php echo $categoria->descripcion?>
                </div>
            </div>
			<div class="social-sticky">
                <?php
                echo '<a href="https://www.facebook.com/Ladata-Mendoza-2451654124872948" target="_blank">' . $this->Html->image("../assets/images/fb-negro.svg") . '</a>';
                echo '<a href="https://instagram.com/ladatamza" target="_blank">' . $this->Html->image("../assets/images/instagram-negro.svg") . '</a>';
                echo '<a href="https://twitter.com/LADATA5" target="_blank">' . $this->Html->image("../assets/images/tw-negro.svg") . '</a>';
                ?>
            </div>

        </div> <!--END CONTAINER CATEGORIA-->
    <?php endforeach ;?>
    <div class="row" id="footer-categoria">
        <div class="col-md-6 col-xs-6">
            <a class="btn-amarillo btn-mas-noticias margen-b-40" onclick="categorias_page('<?=$page ?>')">ver +</a>
        </div>
        <div class="col-md-6 col-xs-6 text-right">
            <a class="btn-amarillo btn-mas-noticias margen-b-40" href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'index'])?>"><i class="fas fa-chevron-left volver-ico"></i> volver</a>
        </div>
    </div>
</div>
<div class="hidden">
<?php echo $this->Html->image("../assets/images/share.svg", ['class' => 'share_home_ncs','id'=> 'image-shared-clone']) ?></div>
<?php echo '<div id="path_imagen_subida">' . $this->Html->image(Cake\Core\Configure::read('path_imagen_subida')) . '</div>'?>
<?php echo '<div class="hidden" id="url-nota">' . $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo']). '</div>' ?>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        shareEffect ('.container-categoria');
        shareEffect ('.container-nota-sociales');
    })
</script>

<?php 
    include('categoria_sociales.ctp');
    include('footer.ctp'); 
?>

