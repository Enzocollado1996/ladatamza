<body>
    <img src="template/Layout/vineta.png">
<div class="sector">
            <?php foreach ($articulos as $norte) :?>        
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
                    <h2><?php echo $norte->titulo?></h2>
                    <hr>
                    <div class="texto">
                   
                     <?php echo $norte->texto; ?>
                    </div>
                    <?php foreach ($norte->imagenes as $imagen) {
        if ($imagen->tipo == 'PUBLICIDAD') {
            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
        }
    } ?>
                
                </div>
                <?php endif ?> 
            </div>
            <?php endforeach ;?>
            <?php 
    echo '<div class="scroller_back back">' . $this->Html->image("../assets/images/back.png") . '</div>';
    
 ?>
</div>

</body>


<style>

.container-noticia{

}
.container-noticia img{
    width: 100%;
    height: 400px;
    object-fit: cover;
    }
    .container-noticia .fecha{
        padding: 11px;
    }

   .sector .container-noticia .contenido{
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