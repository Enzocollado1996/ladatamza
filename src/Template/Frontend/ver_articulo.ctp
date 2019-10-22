<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, height=device-height">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>

    <?=$this->Html->css('../assets/style_detalle.css')?>
    <?=$this->element('modals/socials')?>
    <?=$this->element('modals/search')?>
    <?=$this->element('Frontend/header')?>
</head>
<body>

    <?=$this->element('Frontend/menu-detalle')?>
    <div class="fijo">
    <?php if (count($articulos) > 0): ?>
    <?php $index = 0;foreach ($articulos as $articulo): ?>
    <div class="imagen" id="img_<?php echo $index ?>">
            <div class="time"><?=$articulo->publicado->i18nFormat('dd/MM/YYYY')?></div>
            <!--<div class="bloque"></div>-->
    <?php
if (count($articulo->imagenes) > 0) {
    foreach ($articulo->imagenes as $imagen) {
        if ($imagen->tipo == 'NOTICIA') {
            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
        }
    }
} else {
    echo '<div class="banner-empty"></div>';
}
?>
<div class="share">
                <div onclick="shareNew('<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'ver_articulo', $articulo->slug], true)?>', '', '<?=$articulo->titulo?>')"><?php echo $this->Html->image("../assets/images/share-negro.svg", ['class' => 'share_url']) ?></div>
                <?php echo $this->Html->image("../assets/images/back.svg", ['class' => 'back']) ?>

                </div>
            
        </div>
        <?php $index++;endforeach?>

    <div class="fijo_noticia">
    <!-- <div class="white"></div> -->
    <?php foreach ($articulos as $articulo): ?>
        <section>
            <div class="info <?php echo $articulo->id == $articulos[0]->id ? 'primero' : 'medio' ?>" >
                <div class="titulo"><?=$articulo->titulo;?></div>
                <div class="cuerpo">
                    <?php echo $articulo->texto;
                    if (count($articulo->imagenes) > 0) {
                        foreach ($articulo->imagenes as $imagen) {
                            if ($imagen->tipo == 'PUBLICIDAD') {
                                echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url . '/' . $imagen->filename, ['class' => 'banner']);
                            }
                        }
                    }?>
                </div>
            </div>
            <?php if ($articulo === end($articulos)) {
                echo '<div class="scroller_back back">' . $this->Html->image("../assets/images/back.png") . '</div>';
            }?>
        </section>
    <?php endforeach;?>
    
    <?php echo '<div class="scroller">' . $this->Html->image("../assets/images/arrow-bottom.svg") . '</div>' ?>
    </div>
    </div>
    <?php else: ?>
    <div class="notFound">
    <svg   width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-search">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <span style="color:#000">No se encontraron resultados</span>
            <svg style="width:75px" class="back"  x="0px" y="0px"
	 viewBox="0 0 26.676 26.676" style="enable-background:new 0 0 26.676 26.676;" xml:space="preserve">
<g>
	<path d="M26.105,21.891c-0.229,0-0.439-0.131-0.529-0.346l0,0c-0.066-0.156-1.716-3.857-7.885-4.59
		c-1.285-0.156-2.824-0.236-4.693-0.25v4.613c0,0.213-0.115,0.406-0.304,0.508c-0.188,0.098-0.413,0.084-0.588-0.033L0.254,13.815
		C0.094,13.708,0,13.528,0,13.339c0-0.191,0.094-0.365,0.254-0.477l11.857-7.979c0.175-0.121,0.398-0.129,0.588-0.029
		c0.19,0.102,0.303,0.295,0.303,0.502v4.293c2.578,0.336,13.674,2.33,13.674,11.674c0,0.271-0.191,0.508-0.459,0.562
		C26.18,21.891,26.141,21.891,26.105,21.891z"/>
	<g>

</svg>

    </div>

    <?php endif?>
</body>
</html>
<?=$this->Html->script('../assets/js/jquery.min');?>
<?=$this->Html->script('../assets/js/functions');?>
<?=$this->Html->script('../assets/js/jquery.paroller.min.js');?>

<script>


$(document).ready(function() {

$('.back').on('click',()=>{
    location.href = '/'
})
let height = []
height.push(0)
let cantidad_sections = 0
let index = 0
let total = 0
let sections = $(".fijo_noticia").find('section').get()
$("#img_0").addClass('active')
   sections.forEach(
       section => {
        height.push($(section).height())
           cantidad_sections++;
           total += $(section).height()
        }
   )
   let suma_sections = height[0]
   var subo = 0;
$(".fijo_noticia").on('touchmove',function(){

    let scroll = $(this).scrollTop();

        if(scroll >= (total - (height[height.length - 1]))){
            
            $(".scroller").hide();
        }
        else{
            $(".scroller").show();
        }
        if(subo > scroll){
            console.log("estoy subiendo " + scroll + "subo" + subo)
            if(scroll < suma_sections){
                $(".imagen").removeClass("active")
                suma_sections = suma_sections - height[index]
                index--;
                $("#img_"+index).addClass("active")
                
            }
        }
        else{
            if(scroll > suma_sections){
            $(".imagen").removeClass("active")
             console.log("height entra " + index ,scroll)
             $("#img_"+index).addClass("active")
             index++;
             suma_sections = suma_sections + height[index]
            }
        }
    subo = scroll
})
var watchID = navigator.geolocation.getCurrentPosition(function(position) {
  positions(position.coords.latitude, position.coords.longitude);
});
$("#target").submit(function(event) {
        event.preventDefault();
        let data = $(this).find('input').val()
        location.href = `${$(this).attr('action')}/${data}`
    });
});



</script>