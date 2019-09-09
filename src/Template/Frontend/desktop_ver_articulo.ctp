<?php
    $articulo = $articulos[0];
    $zona = $articulo->zona;
?>

<div class="container-fluid text-center margen-40">   
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="keyword margen-40"><?php echo $articulo->palabras_claves;?> </div>
            <div class="titulo-interior-nota text-uppercase margen-40"><?php echo $articulo->titulo;?> </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <?php 
                if (count($articulo->imagenes) > 0) {
                    foreach ($articulo->imagenes as $imagen) {
                        if ($imagen->tipo == 'NOTICIA') {
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'img-interior-nota']);
                        }
                    }
                } else {
                    echo '<div class="banner-empty"></div>';
                }
                ?>
            <div class="extracto-interior-nota text-left"><?php echo $articulo->descripcion;?></div>
            <div class="cuerpo-interior-nota margen-40 text-left"><?php echo $articulo->texto;?></div>
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
    </div>
    <div class="social-sticky">
        <?php
        echo '<a href="https://www.facebook.com/" target="_blank">' . $this->Html->image("../assets/images/fb-negro.svg") . '</a>';
        echo '<a href="https://www.instagram.com/?hl=es-la" target="_blank">' . $this->Html->image("../assets/images/instagram-negro.svg") . '</a>';
        echo '<a href="https://twitter.com/" target="_blank">' . $this->Html->image("../assets/images/tw-negro.svg") . '</a>';
        ?>
    </div>
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
        </div> <!--END CONTAINER NOTICIAS-->
    </div><!--END SOCIALES-->
</div> <!-- END CONTAINER-->
 <?php include('footer.ctp'); ?>


<style>
/*
.container-noticia-interior{

}
.container-noticia-interior img{
    width: 100%;
    height: 400px;
    object-fit: cover;
    }
    .container-noticia-interior .fecha{
        padding: 11px;
    }

   .sector .container-noticia-interior .contenido{
        width: 60%;
    margin: 0 auto;
    text-align: justify;
    }
    .contenido .texto{
        font-size: 1.5em;
       font-weight: 100;
       font-family: ptsans;
    }
    .contenido h2{
        font-size: 2em;
        font-family: ptsans;
    }
    .scroller_back {
        position: relative;
    bottom: 40px;
    display: flex;
    justify-content: center;
    margin: 100px 0;
}
    .scroller_back img {
        height: 35px;
    animation: .7s fadeInRight infinite;
}

*/
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