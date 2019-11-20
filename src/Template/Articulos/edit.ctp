<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Articulo $articulo
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Editar artículo
            <?= $this->Html->link('<span class="fa fa-trash"></span>&nbsp;Eliminar', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModal' . $articulo->id, 'escape' => false, 'title' => 'Eliminar', 'class' => 'btn btn-danger pull-right']) ?>
            <a href="<?=$this->Url->build(['action' => 'index'], true)?>" class="btn btn-default pull-right" style="margin-right:5px;"><span class="fa fa-th-list"></span>&nbsp;Listado</a>            
            <div class="modal fade" id="basicModal<?= $articulo->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $articulo->id ?>?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <?= $this->Form->postLink('Borrar', ['action' => 'delete', $articulo->id], ['class' => 'btn btn-danger']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <?= $this->Form->create($articulo,['type' => 'file', 'class' => '', 'id'=>'bootstrapTagsInputForm', 'onkeypress'=>'return event.keyCode != 13;']) ?>
    <div class="col-lg-6">    
        <div class="form-group">
            <?=$this->Form->input('zona',['type' => 'select','options' =>$zonas,'label' => 'Categoría', 'class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->control('titulo',['label' => 'Título', 'class'=>'form-control', 'required' => 'required']);?>
            <h6 class="pull-right" id="count_message_titulo"></h6>
        </div>        
        <div class="form-group">
            <label>Descripción</label>
            <?=$this->Form->textarea('descripcion',['class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->control('linkpublicidad',['label' => 'Link de la Publicidad', 'class'=>'form-control']);?>
            <h6 class="pull-right" id="count_message_linkpublicidad"></h6>
        </div>        
        <div class="form-group">
            <label>Texto</label>
            <?=$this->Form->textarea('texto',['class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <div class="input text required">
                <label for="datetimepicker1">Fecha de publicación</label>
                <div class='input-group date' id='datetimepicker1' required>
                    <input type='text' class="form-control" name="datetimepicker1"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <?=$this->Form->control('palabras_claves',['label' => 'Palabra clave', 'class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <?=$this->Form->input('habilitado', ['label' => 'Nota visible','type' => 'checkbox']);?>
                </label>
            </div>
        </div>
        <?= $this->Form->button('Guardar',['class'=>'btn btn-success btn-block','type' => 'submit']) ?>
    </div>
    <?php
    //echo '<pre>';
    //var_dump($articulo);
    //echo '</pre>';
    ?>
    <div class="col-lg-6">
        <div class="form-group">
        <?= $this->Html->link('<span class="fa fa-trash"></span>&nbsp; Eliminar foto', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModalEliminarFotoNoticia' . $articulo->id, 'escape' => false, 'title' => 'Eliminar', 'class' => 'btn btn-danger pull-right']) ?>
            <?php echo $this->Form->input('filename[]', ['type' => 'file', 'label'=>'Imágen principal'/*, 'multiple'*/, 'accept'=>'.gif, .jpg, .jpeg, .png']); ?>
            <div class="form-group" id ="imagen-articulo">
                <?php
                if($articulo->has('imagenes')){
                    foreach($articulo->imagenes as $imagen){
                        if($imagen->tipo == 'NOTICIA'){
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url.'/'.$imagen->filename, 
                                ['style'=> 'position: relative; width: 100%; margin: 10px 0;']);
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="form-group">
        <?= $this->Html->link('<span class="fa fa-trash"></span>&nbsp; Eliminar foto', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModalEliminarFotoPublicidad' . $articulo->id, 'escape' => false, 'title' => 'Eliminar', 'class' => 'btn btn-danger pull-right']) ?>
            <?php echo $this->Form->input('filename2[]', ['type' => 'file', 'label'=>'Imágen publicidad'/*, 'multiple'*/, 'accept'=>'.gif, .jpg, .jpeg, .png']); ?>
            <div class="form-group" id ="imagen-articulo2">
                <?php
                if($articulo->has('imagenes')){
                    foreach($articulo->imagenes as $imagen){
                        
                        if($imagen->tipo == 'PUBLICIDAD'){
                            //echo '<pre>';
                            //var_dump($imagen->tipo);
                            //echo '</pre>';
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url.'/'.urlencode($imagen->filename), 
                                ['style'=> 'position: relative; width: 100%; margin: 10px 0;']);
                        }
                    }
                }
                ?>
            </div>
        </div>
        <div class="form-group">
        <?= $this->Html->link('<span class="fa fa-trash"></span>&nbsp; Eliminar foto', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModalEliminarFotoGif' . $articulo->id, 'escape' => false, 'title' => 'Eliminar', 'class' => 'btn btn-danger pull-right']) ?>
            <?php echo $this->Form->input('filename3[]', ['type' => 'file', 'label'=>'Imágen gif'/*, 'multiple'*/, 'accept'=>'.gif, .jpg, .jpeg, .png']); ?>
            <div class="form-group" id ="imagen-articulo3">
                <?php
                if($articulo->has('imagenes')){
                    foreach($articulo->imagenes as $imagen){
                        if($imagen->tipo == 'GIF'){
                            //echo '<pre>';
                            //var_dump($imagen->tipo);
                            //echo '</pre>';
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url.'/'.urlencode($imagen->filename), 
                                ['style'=> 'position: relative; width: 100%; margin: 10px 0;']);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>    
    <?= $this->Form->end() ?>
</div>
<div class="modal fade" id="basicModalEliminarFotoNoticia<?= $articulo->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $articulo->id ?>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <?= $this->Form->postLink('Borrar', ['action' => 'deletefoto', $articulo->id,'NOTICIA'], ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="basicModalEliminarFotoPublicidad<?= $articulo->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $articulo->id ?>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <?= $this->Form->postLink('Borrar', ['action' => 'deletefoto', $articulo->id,'PUBLICIDAD'], ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="basicModalEliminarFotoGif<?= $articulo->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $articulo->id ?>?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <?= $this->Form->postLink('Borrar', ['action' => 'deletefoto', $articulo->id,'GIF'], ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
</div>


<?= $this->Html->script(['//cdn.ckeditor.com/4.11.4/standard/ckeditor.js']) ?>
<?php $this->Html->scriptStart(['block' => true]); ?>
    $(document).ready(function() {
        $('#datetimepicker1').datetimepicker({
            "defaultDate":new Date("<?=$articulo["publicado"]->i18nFormat('YYY-MM-dd HH:mm')?>")
        });
        
        CKEDITOR.replace('texto');
        $('select[name=zona]').change();
    });
    
    $('select[name=zona]').change(function() {
        calcularCaracteres();
    });

    function calcularCaracteres(){
        var zona = $('select[name=zona] option:selected').val();
        var text_max = 0;
        if(zona == 'NORTE' || zona == 'SUR' || zona == 'CENTRO'){
            text_max = 51;            
        }
        else{//generales
            text_max = 68;
        }
        
        var text_actual = $('input[name=titulo]').val().length;
        if(text_actual > text_max){
            $('input[name=titulo]').val($('input[name=titulo]').val().substring(0, text_max));
            text_actual = $('input[name=titulo]').val().length;
        }
        
        $('input[name=titulo]').attr('maxlength',text_max);
        $('#count_message_titulo').html(text_max-text_actual + ' caracteres restantes');

        $('input[name=titulo]').keyup(function() {
          var text_length = $(this).val().length;
          var text_remaining = text_max - text_length;

          $('#count_message_titulo').html(text_remaining + ' caracteres restantes');
        });
    }
    
    function archivo(evt) {
        $('#imagen-articulo').empty();
        var files = evt.target.files; // FileList object

        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {           
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            reader.onload = (function(theFile) {
                return function(e) {
                    // Insertamos la/s imagen/es
                    $("#imagen-articulo").append('<img src="'+e.target.result+'" class="form-group" style="width: 100%;"/>');
                    
                };
          })(f);

          reader.readAsDataURL(f);
        }        
    }
    function archivo2(evt) {
        $('#imagen-articulo2').empty();
        var files = evt.target.files; // FileList object

        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {           
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            reader.onload = (function(theFile) {
                return function(e) {
                    // Insertamos la/s imagen/es
                    $("#imagen-articulo2").append('<img src="'+e.target.result+'" class="form-group" style="width: 100%;"/>');                    
                };
          })(f);
          reader.readAsDataURL(f);
        }        
    }
    function archivo3(evt) {
        $('#imagen-articulo3').empty();
        var files = evt.target.files; // FileList object

        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {           
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }

            var reader = new FileReader();

            reader.onload = (function(theFile) {
                return function(e) {
                    // Insertamos la/s imagen/es
                    $("#imagen-articulo3").append('<img src="'+e.target.result+'" class="form-group" style="width: 100%;"/>');                    
                };
          })(f);
          reader.readAsDataURL(f);
        }        
    } 

    document.getElementById('filename').addEventListener('change', archivo, false);
    document.getElementById('filename2').addEventListener('change', archivo2, false);
    document.getElementById('filename3').addEventListener('change', archivo3, false);

<?php $this->Html->scriptEnd(); ?>
<script>
function deletefoto(n){
    var url = window.location.origin;
    alert(url+"/articulos/deletefoto/"+n);
    jQuery.ajax({
        type:"POST",
        dataType:"json",
        url: url+"/articulos/deletefoto/"+n,
        success: function(data) {
            successmessage = 'Data was succesfully captured';
            alert(successmessage);
        },
});

}
</script>