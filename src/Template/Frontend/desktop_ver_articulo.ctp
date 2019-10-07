<?php
    $articulo = $articulos[0];
    $zona = $articulo->zona;
?>
<meta property="og:image" content="https://www.mdzol.com/files/og_thumbnail/files/fp/uploads/2019/10/06/5d9a39b61727a.r_d.1472-619.jpeg">
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
                            echo '<div class="clone-image">';
                            echo '<a class="hidden foto-publicidad" href="'.$articulo->linkpublicidad.'" target="_blank">';
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename);
                            echo '</a>';
                            echo '</div>';
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
<script>
$( document ).ready(function() {
    var count = $(".cuerpo-interior-nota").find('p').length;
    console.log(count);
    var count = parseInt(count, 10) / 2;
    var count = Math.round(count);
    var count = count + 1;
    console.log(count);
    $(".cuerpo-interior-nota p:nth-child("+count+")").addClass("fotocuerpo");
    $(".clone-image").clone(true, true).contents().appendTo('.fotocuerpo');
    $(".fotocuerpo .foto-publicidad").removeClass("hidden");

    console.log( count );
});
</script>