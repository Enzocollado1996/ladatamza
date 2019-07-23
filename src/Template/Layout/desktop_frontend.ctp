<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?= $this->Html->css('../assets/owl.carousel.min') ?>
    <?= $this->Html->css('../assets/owl.theme.desk') ?>
    <?= $this->Html->css('../assets/style.desk') ?>
</head>
<body>
<div id="owl-demo" class="owl-carousel owl-theme">
        <?php foreach ($articulos_general as $general) {?>
            <div class="item">
            <div onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $general->slug], true)?>', '', '<?=$articulo->titulo?>')"><?php echo $this->Html->image("../assets/images/share2.png", ['class' => 'share_url']) ?></div>
            <?php
                if ($general->has('imagenes')) {
                    $imagen = $general->imagenes[0];
                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename);
                    // echo '<div class="asd" style="background:url('.$this->Url->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename).')">';

                    } else {
                        echo '<img src="assets/images/test.jpg" alt="">';
                    }
                    ?>

                <div class="titulo">
                    <div onclick="generales('<?= $this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo',$general->slug]) ?>')">
                    <?=$general->titulo?>
                    </div>
                </div>
            </div>
        <?php }?>
    </div>
</body>
</html>
<?= $this->Html->script('../assets/js/jquery.min'); ?>
<?= $this->Html->script('../assets/js/slick.min'); ?>
<?= $this->Html->script('../assets/js/flipclock.min'); ?>
<?= $this->Html->script('../assets/js/functions'); ?>
<?= $this->Html->script('../assets/js/index'); ?>
<?= $this->Html->script('../assets/js/owl.carousel.min'); ?>
