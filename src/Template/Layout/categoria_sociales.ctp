<div class="container-sociales">
        <div class="container noticias">
        <div class="row">
            <div class="col-md-4">
                <div class="header-notices-sociales">sociales</div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($articulos_sociales as $key => $sociales) :?>
            <div class="col-md-4 margen-40">
                <div class="container-nota-sociales"> 
                    <div class="contenedor-img-txt">
                        <?php if(!isset($sociales->titulo)):?>
                            <?php echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $sociales->imagen->file_url . '/' . $sociales->imagen->filename, ['style'=> 'width:100%']);?>
                        <?php else : ?> 
                        <!--<div class="fecha"><?=$sociales->publicado->i18nFormat('dd/MM/YYYY')?></div>-->
                        <div class="share" onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $sociales->slug], true)?>', '', '<?=$sociales->titulo?>')"><?php echo $this->Html->image("../assets/images/share.svg", ['class' => 'share_home_ncs']) ?></div>
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
                        <div class="contenido" onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$sociales->slug]) ?>')">
                            <div class="keyword"><?php echo $sociales->palabras_claves?></div>
                            <div id="<?= $sociales->id?>" class="titulo-nota-home">
                                <span></span><?php echo $sociales->titulo?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?> 
            <?php endforeach ;?>
            </div>
        </div>
    </div>

<script type="text/javascript">
    alignContenido('.container-sociales .contenido');
</script>