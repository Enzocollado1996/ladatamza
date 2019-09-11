<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" integrity="sha256-piqEf7Ap7CMps8krDQsSOTZgF+MU/0MPyPW2enj5I40=" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">


    <?= $this->Html->css('../assets/owl.carousel.min') ?>
    <?= $this->Html->css('../assets/owl.theme.desk') ?>
    <?= $this->Html->css('../assets/style.desk') ?>
    <?= $this->element('modals/socials') ?>
    <?=$this->element('modals/search')?>
    <script type="text/javascript">
        $(document).ready(function(){
          $('header').css("position","relative");
        });
        $(window).scroll(function() {
          if ($(this).scrollTop() > 1){  
            $('header').css("position","fixed");
          }
          else {
            $('header').css("position","relative");
          }
        });

      function alignContenido(element){
        var altura_arr = [];
        jQuery(element).each(function(){
          var altura = jQuery(this).height(); 
          altura_arr.push(altura);
        });
        altura_arr.sort(function(a, b){return b-a}); 
        jQuery(element).each(function(){
          jQuery(this).css('height',altura_arr[0]+8);
        });
      }

      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }

    </script>

</head>
<header class="navbar navbar-custom navbar-fixed-top sticky">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 row-menu">
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
            <svg class="close" width="18" version="1.1" xmlns="http://www.w3.org/2000/svg" height="64" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 64 64">
              <g>
                  <path fill="#feee00" d="M28.941,31.786L0.613,60.114c-0.787,0.787-0.787,2.062,0,2.849c0.393,0.394,0.909,0.59,1.424,0.59   c0.516,0,1.031-0.196,1.424-0.59l28.541-28.541l28.541,28.541c0.394,0.394,0.909,0.59,1.424,0.59c0.515,0,1.031-0.196,1.424-0.59   c0.787-0.787,0.787-2.062,0-2.849L35.064,31.786L63.41,3.438c0.787-0.787,0.787-2.062,0-2.849c-0.787-0.786-2.062-0.786-2.848,0   L32.003,29.15L3.441,0.59c-0.787-0.786-2.061-0.786-2.848,0c-0.787,0.787-0.787,2.062,0,2.849L28.941,31.786z"></path>
              </g>
            </svg>
          </a>
          <a href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'categoria', 'norte'], true)?>">Norte</a>
          <a href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'categoria', 'centro'], true)?>">Centro</a>
          <a href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'categoria', 'sur'], true)?>">Sur</a>
          <a href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'categoria', 'sociales'], true)?>">Sociales</a>
          <a href="#contacto">Contacto</a>
        </div>
        <span class="icono-menu" onclick="openNav()"><i class="fas fa-bars"></i></span>
        <span class="logo-texto"> <?php echo $this->Html->image("../assets/images/logo-txt.svg"); ?> </span>
        <div class="logo-texto-vertical"> <?php echo $this->Html->image("../assets/images/logo-texto-vertical.svg"); ?> </div>
      </div>
      <div class="col-md-6 text-center">
        <div class="logo">
          <a href="<?=$this->Url->build(['controller' => 'Frontend', 'action' => 'index'])?>">
            <?php echo $this->Html->image("../assets/images/logo.svg"); ?>
          </a>
        </div>
      </div> <!--END COL-MD-6-->
      <div class="col-md-3 text-right row-menu right-menu">
        <svg class="lupa" version="1.2" onclick="socialModal(true);" width="36" height="36" baseProfile="tiny" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612 792" xml:space="preserve">
        <g id="">
          <path id="XMLID_751_" fill="#fff" stroke="#211915" stroke-miterlimit="10" d="M417.6,475.2L414,471.6c0-3.6,3.6-3.6,3.6-7.199
              c39.601-50.4,54-115.2,36-176.4S388.8,180,331.2,162c-14.4-3.6-25.2-7.2-32.4-7.2c-3.6,0-7.2,0-14.4-3.6H252h-3.6h-3.6
              c-50.4,7.2-97.2,32.4-126,72c-32.4,43.2-46.8,93.6-39.6,144C86.4,432,129.6,489.6,190.8,514.8C252,543.6,320.4,536.4,374.4,500.4
              l7.199-3.601l36,36c32.4,32.4,64.801,64.8,97.2,97.2c3.601,3.6,7.2,3.6,10.8,7.2l3.601,3.6l0,0H540l0,0c7.2-7.2,14.4-10.8,14.4-18
              S550.8,608.4,543.6,601.2L417.6,475.2z M414,345.6c0,79.2-64.8,147.6-147.6,147.6l0,0c-39.6,0-75.6-14.4-104.4-43.2
              s-43.2-64.8-43.2-108c0-79.2,64.8-144,147.6-144l0,0c39.6,0,75.6,14.4,104.4,43.2C399.6,266.4,414,306,414,345.6z"></path>
        </g>
        </svg>
        <svg class="heart" onclick="socialModal();"  width="36" height="36" version="1.2" baseProfile="tiny" id="Capa_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" width="612px" height="792px" viewBox="0 0 612 792" xml:space="preserve">
        <g id="Capa_1_1_"></g>
        <g id="Object">
          <path id="XMLID_754_" fill="#fff" stroke="#211915" stroke-miterlimit="10" d="M579.6,302.4v-7.2c0-3.6,0-10.8-3.6-14.4
            c-10.8-50.4-43.2-82.8-93.6-100.8c-21.601-7.2-39.601-10.8-61.2-10.8c-25.2,0-50.4,3.6-75.601,18c-14.399,10.8-28.8,18-39.6,32.4
            c-25.2-25.2-57.6-43.2-97.2-46.8c-18-3.6-39.6,0-61.2,3.6c-32.4,7.2-57.6,18-75.6,39.6c-21.6,18-36,46.8-39.6,75.6L28.8,306v28.8
            v3.6c0,28.8,10.8,57.6,28.8,86.4s39.6,57.601,72,90c21.6,21.601,43.2,43.2,64.8,64.8l43.2,43.2c10.8,10.8,21.6,21.601,32.4,32.4
            s21.6,14.399,32.4,14.399c10.8,0,21.6-3.6,32.399-14.399c7.2-7.2,18-14.4,25.2-25.2l46.8-43.2c21.601-21.6,46.8-46.8,68.4-68.399
            c32.399-32.4,54-61.2,72-90c7.2-14.4,21.6-36,25.2-61.2c0-7.2,3.6-14.4,3.6-18v-10.8L579.6,302.4z M288,273.6l3.6,7.2l0,0l7.2,7.2
            l0,0l10.8,10.8l14.4-25.2c18-25.2,43.2-43.2,75.6-50.4c36-7.2,68.4,0,97.2,21.6c18,10.8,28.8,28.8,32.4,54
            c3.6,18,3.6,39.6-3.601,57.6c-3.6,14.4-10.8,28.8-18,39.6c-14.399,25.2-36,50.4-64.8,79.2c-21.6,21.6-43.2,43.2-64.8,61.2l-36,36
            c-3.6,10.8-10.8,18-18,25.199L309.6,612l-3.6,3.6l-3.6-3.6l-36-36c-32.4-32.4-64.8-64.8-100.8-97.2c-25.2-25.2-46.8-54-64.8-79.2
            C79.2,367.2,72,331.2,82.8,291.6c7.2-25.2,18-43.2,39.6-54c21.6-10.8,43.2-18,64.8-18c7.2,0,10.8,0,18,0
            C241.2,226.8,270,244.8,288,273.6z"/>
          </g>
        </svg>
      </div>
    </div><!--END ROW-->
  </div><!--END CONTAINER FLUID-->
</header>
