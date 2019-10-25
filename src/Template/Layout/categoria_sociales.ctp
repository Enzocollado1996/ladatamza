<div class="container-sociales">
        <?php 
        if($gifsociales){
            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $gifsociales[0]['file_url'] . '/' . $gifsociales[0]['filename'], ['class' => 'banner_sociales']);
        }
        ?>
        <div class="container noticias">
        <div class="row">
            <div class="col-md-4">
                <div class="header-notices-sociales">sociales</div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($articulos_sociales as $key => $sociales) :?>
                <div class="col-md-4 col-sm-4 margen-40">
                    <div class="container-nota-sociales container-noticia" id=<?= 'nota-' . $sociales->id?>>
                        <?php 
                        if(!isset($sociales->titulo)):?>
                            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $sociales->imagen->file_url . '/' . $sociales->imagen->filename, ['style'=> 'width:100%']);?>
                        <?php else : ?> 
                        <div class="share-sector btn-share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $sociales->slug], true)?>', '', '<?=$sociales->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => 'share_home_ncs']) ?></div>
                        <!--<div class="fecha"><?=$sociales->publicado->i18nFormat('dd/MM/YYYY')?></div>-->
                        <div class="contenedor-img-txt" id=<?= 'contenedor-img-txt-' . $sociales->id?>>
                            <div class="img-nota">
                                <?php if (count($sociales->imagenes) > 0) {
                                    foreach ($sociales->imagenes as $imagen) {
                                        if ($imagen->tipo == 'NOTICIA') {
                                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota-sociales banner imagen']);
                                        }
                                        if ($imagen->tipo == 'GIF') {
                                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'imagen-nota-sociales banner gif hidden']);
                                        }
                                    }
                                } else {
                                    echo '<div class="banner-empty"></div>';
                                }?>
                            </div>
                            <div class="icons-share">
                              <a onclick="compartirnota('<?= $sociales->slug ?>', 'facebook')"><i class="fab fa-facebook-f"></i></a>
                              <a onclick="compartirnota('<?= $sociales->slug ?>', 'wsp')"><i class="fab fa-whatsapp"></i></a>
                              <a onclick="compartirnota('<?= $sociales->slug ?>', 'twitter')"><i class="fab fa-twitter"></i></a>
                              <a onclick="compartirnota('<?= $sociales->slug ?>', 'mailito')"><i class="fas fa-envelope"></i></a>
                            </div>
                            <div class="contenido" onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$sociales->slug]) ?>')">
                                <div class="keyword"><?php echo $sociales->palabras_claves?></div>
                                <div id="<?= $sociales->id?>" class="titulo-nota-home">
                                    <span></span><?php echo $sociales->titulo?>
                                </div>
                            </div>
                            <?php endif ?> 
                        </div><!--END contenedor-img-txt-->
                    </div><!--END container-nota-sociales-->
                </div>
            <?php endforeach ;?>
        </div>
    </div>

<?= $this->Html->script('../assets/js/functions'); ?>

<script type="text/javascript">
$(window).load(function(){
    alignContenido('.imagen-nota-sociales');
})

$(document).ready(function(){
    
    shareEffect ('.container-nota-sociales');
})
</script>