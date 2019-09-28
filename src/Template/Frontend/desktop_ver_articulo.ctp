<?php include($_SERVER['DOCUMENT_ROOT'].'ladatamza/src/template/Layout/header.ctp'); ?>
<?php
    $articulo = $articulos[0];
    $zona = $articulo->zona;
?>

<div class="container-fluid text-center interior-nota">   
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="keyword"><?php echo $articulo->palabras_claves;?> </div>
            <div class="titulo-interior-nota text-uppercase"><?php echo $articulo->titulo;?> </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-tablet">
            <div class="col-md-offset-2 col-md-8">
                <?php 
                if (count($articulo->imagenes) > 0) {
                    foreach ($articulo->imagenes as $imagen) {
                        if ($imagen->tipo == 'NOTICIA') {
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'img-interior-nota']);
                        }
                        if ($imagen->tipo == 'GIF') {
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner hidden']);
                        }
                    }
                } else {
                    echo '<div class="banner-empty"></div>';
                }
                ?>
            <div class="row">
                <div class="col-md-offset-2 col-sm-offset-1">
                    <div class="cuerpo-interior-nota margen-40 text-left">
                        <div class="extracto-interior-nota"><?php echo $articulo->descripcion; ?></div>
                        <?php echo $articulo->texto;?>
                    </div>
                </div>
            </div>
             <?php 
                echo $articulo->tipo;
                if (count($articulo->imagenes) > 0) {
                    foreach ($articulo->imagenes as $imagen) {
                        if ($imagen->tipo == 'PUBLICIDAD') {
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'img-interior-nota']);
                        }
                    }
                } else {
                    echo '<div class="banner-empty"></div>';
                }
                ?>
         </div>
        </div>
        <div class="row row-tablet text-right">
        <a class="btn-amarillo btn-mas-noticias margen-b-40" href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'categoria', strtolower($zona)], true)?>"><i class="fas fa-chevron-left volver-ico"></i> volver</a>
        </div>
    </div>
    <div class="social-sticky">
        <?php
        echo '<a href="https://www.facebook.com/" target="_blank">' . $this->Html->image("../assets/images/fb-negro.svg") . '</a>';
        echo '<a href="https://www.instagram.com/?hl=es-la" target="_blank">' . $this->Html->image("../assets/images/instagram-negro.svg") . '</a>';
        echo '<a href="https://twitter.com/" target="_blank">' . $this->Html->image("../assets/images/tw-negro.svg") . '</a>';
        ?>
    </div>
</div> <!-- END CONTAINER-->
<style>
@keyframes fadeOutDown {
    from {
        opacity: 1;
    }

    to {
        opacity: 0;
        transform: translate3d(0, 100%, 0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translate3d(100%, 0, 0);
    }

    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
}
</style>