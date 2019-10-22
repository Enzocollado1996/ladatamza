<keyword class="text-center keyword-style">
    <section id="footer">
        <div class="container">
            <div class="row text-center">
                <div class="ladata-vertical margen-40"><?php echo $this->Html->image("../assets/images/logo-ladata-vertical.svg"); ?></div>
                <div class="social-link margen-40">
                   <?php 
                    echo '<a href="https://www.facebook.com/Ladata-Mendoza-2451654124872948/" target="_blank">' . $this->Html->image("../assets/images/fb-negro.svg") . '</a>';
                    echo '<a href="https://instagram.com/ladatamza" target="_blank">' . $this->Html->image("../assets/images/instagram-negro.svg") . '</a>';
                    echo '<a href="#" target="_blank">' . $this->Html->image("../assets/images/tw-negro.svg") . '</a>';
                   ?>
                </div>
            </div><!--END ROW-->
            <div class="row">
                <div class="col-md-offset-3 col-md-6 contact-form" id="contacto">
                    <form id="formulario" class="form" role="form" >
                      <div class="form-group">
                        <input id="nombre" class="form-control input-lg" type="text" name="nombre" placeholder="Nombre*">
                        <div id="nombreerror" class="text-danger"></div>
                      </div>
                      <div class="form-group">
                        <input id="telefono" class="form-control input-lg" type="text" name="telefono" placeholder="Tel&eacute;fono">
                        <div id="telefonoerror" class="text-danger"></div>
                      </div>
                      <div class="form-group">
                        <input id="email" class="form-control input-lg" type="text" name="email" placeholder="Mail*">
                        <div id="emailerror" class="text-danger"></div>
                      </div>
                      <div class="form-group form-textarea">
                        <textarea id="mensaje" class="form-control input-lg" type="text" name="mensaje" placeholder="Mensaje*"></textarea>
                        <div id="mensajeerror" class="text-danger"></div>
                      </div>
                      <div class="form-group last text-right" id="enviar">
                        <a class="btn-black btn-gral" onclick="enviar()" href="#">Enviar</a>
                      </div>
                    </form>  
                </div>
            </div>
            <div class="row">
                <div class="margen-40">
                    <strong>San Rafael Mendoza Argentina</strong> <br>
                    todos los derechos reservados - LA DATA MZA - 2019
                </div>
                <hr class="linea-final">
            </div>
        </div><!--END CONTAINER-->
    </section>
</keyword>
</body>
</html>

<script type="text/javascript">
$( window ).on( "orientationchange", function( event ) {
  location.reload();
});

function generales(url){
  location.href = url
}

function enviar(){
    var nombre = $("#nombre").val();
    var telefono = $("#telefono").val();
    var email = $("#email").val();
    var mensaje = jQuery("textarea#mensaje").val();
    var url_base = window.location.origin;
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    $.ajax({
      type: 'POST',
      url: url_base + "/mail/send",
      data: {
        'nombre': nombre,
        'telefono': telefono,
        'email': email,
        'mensaje': mensaje
      },
      dataType: 'json',
      headers: {
        'X-CSRF-Token': csrfToken
      },
      success: function(data){
        console.log(data)
      },
      error: function(xhr, textStatus, errorThrown) {
          console.log(xhr);
      }
  });
}

function validacion()
{
var nombre = $.trim($('#nombre').val());
var apellido  = $.trim($('#apellido').val());
var dnu  = $.trim($('#dni').val());
var provincia  = $.trim($('#provincia').val());
var telefono = $.trim($('#telefono').val());
var email = $.trim($('#email').val());
var error = 0;
 
if($("#nombre").val() === ""){
  $("#nombreerror").html("Por favor, complete el campo requerido.");
  error=1;
}else if (isNaN($("#nombre").val())){
  $("#nombreerror").html("Por favor, ingrese un nombre v&aacute;lido.");
  error=1;
}else{
  $("#nombreerror").html("");
}

if (isNaN($("#telefono").val())){
  $("#telefonoerror").html("El n&uacute;mero de tel&eacute;fono no es v&aacute;lido.");
   error=1;
}else{
  $("#telefonoerror").html("");
}


if($("#email").val() === ""){
  $("#emailerror").html("Por favor, complete el campo requerido.");
  error=1;
}else if (!validateEmail($("#email").val())){
  $("#emailerror").html("La direcci&oacute;n de correo no es v&aacute;lida.");
   error=1;
}else{
  $("#emailerror").html("");
}


if($("#mensaje").val() === ""){
  $("#mensajeerror").html("Por favor, complete el campo requerido.");
  error=1;
}else{
  $("#mensajeerror").html("");
}


if(error >0){
    scrollform();
    return false;
  }else{
     return true;
  }
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function scrollform(){
$('html, body').animate({
        scrollTop: $("#footer").offset().top
    }, 500);
}
</script>

<?= $this->Html->script('../assets/js/jquery.min'); ?>
<?= $this->Html->script('../assets/js/slick.min'); ?>
<?= $this->Html->script('../assets/js/flipclock.min'); ?>
<?= $this->Html->script('../assets/js/functions'); ?>
<?= $this->Html->script('../assets/js/index'); ?>
<?= $this->Html->script('../assets/js/owl.carousel.min'); ?>