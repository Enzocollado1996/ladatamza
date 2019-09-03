<keyword class="text-center keyword-style">
    <section id="footer">
        <div class="container">
            <div class="row text-center">
                <div class="ladata-vertical margen-40"><?php echo $this->Html->image("../assets/images/logo-ladata-vertical.svg"); ?></div>
                <div class="social-link margen-40">
                   <?php 
                    echo '<a href="#" target="_blank">' . $this->Html->image("../assets/images/fb-negro.svg") . '</a>';
                    echo '<a href="#" target="_blank">' . $this->Html->image("../assets/images/instagram-negro.svg") . '</a>';
                    echo '<a href="#" target="_blank">' . $this->Html->image("../assets/images/tw-negro.svg") . '</a>';
                   ?>
                </div>
            </div><!--END ROW-->
            <div class="row">
                <div class="col-md-offset-3 col-md-6 contact-form">
                    <form id="formulario" class="form" role="form" method="POST" action="send_form_email.php">
                      <div class="form-group">
                        <input id="nombre" class="form-control input-lg" type="text" name="nombre" placeholder="Nombre">
                        <div id="nombreerror" class="text-danger"></div>
                      </div>
                      <div class="form-group">
                        <input id="telefono" class="form-control input-lg" type="text" name="telefono" placeholder="Tel&eacute;fono">
                        <div id="telefonoerror" class="text-danger"></div>
                      </div>
                      <div class="form-group">
                        <input id="email" class="form-control input-lg" type="text" name="email" placeholder="Mail">
                        <div id="emailerror" class="text-danger"></div>
                      </div>
                      <div class="form-group form-textarea">
                        <textarea id="mensaje" class="form-control input-lg" type="text" name="mensaje" placeholder="Mensaje"></textarea>
                        <div id="mensajeerror" class="text-danger"></div>
                      </div>
                      <div class="form-group last text-right" id="enviar">
                        <a class="btn-black btn-gral" onclick="javascript:enviar();" href="#">Enviar</a>
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