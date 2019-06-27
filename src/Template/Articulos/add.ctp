<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Articulo $articulo
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Nuevo artículo
            <a href="<?=$this->Url->build(['action' => 'index'], true)?>" class="btn btn-default pull-right"><span class="fa fa-th-list"></span>&nbsp;Listado</a>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <?= $this->Form->create($articulo,['type' => 'file', 'class' => '', 'id'=>'bootstrapTagsInputForm', 'onkeypress'=>'return event.keyCode != 13;']) ?>
    <div class="col-lg-6">    
        <div class="form-group">
            <?=$this->Form->control('titulo',['label' => 'Título', 'class'=>'form-control', 'required' => 'required']);?>
        </div>        
        <div class="form-group">
            <label>Descripción</label>
            <?=$this->Form->textarea('descripcion',['class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <label>Texto</label>
            <?=$this->Form->textarea('texto',['class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <div class="input text required">
                <label for="datetimepicker1">Fecha de publicación</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="datetimepicker1" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>            
        </div>
        <div class="form-group">
            <?=$this->Form->input('zona',['type' => 'select','options' =>$zonas,'label' => 'Categoría', 'class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->control('palabras_claves',['label' => 'Palabra clave','placeholder' => 'San Rafael', 'class'=>'form-control', 'required' => 'required']);?>
        </div>
<!--        <div class="form-group">
            <?=$this->Form->control('visitas',['label' => 'Visitas', 'class'=>'form-control', 'step' => 1, 'required' => 'required']);?>
        </div>        -->
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <?=$this->Form->input('habilitado', ['label' => 'Nota visible','type' => 'checkbox']);?>
                </label>
            </div>
        </div>
        <?= $this->Form->button('Guardar',['class'=>'btn btn-success btn-block','type' => 'submit']) ?>
    </div>
    <div class="col-lg-6">
        <div class="form-group">            
            <?php echo $this->Form->input('filename[]', ['type' => 'file', 'label'=>'Imágen principal'/*, 'multiple'*/, 'accept'=>'.gif, .jpg, .jpeg, .png']); ?>
            <div class="form-group" id="imagen-articulo"></div>
        </div>
        <div class="form-group">            
            <?php echo $this->Form->input('filename2[]', ['type' => 'file', 'label'=>'Imágen publicidad'/*, 'multiple'*/, 'accept'=>'.gif, .jpg, .jpeg, .png']); ?>
            <div class="form-group" id="imagen-articulo2"></div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script(['//cdn.ckeditor.com/4.11.4/standard/ckeditor.js']) ?>
<?php $this->Html->scriptStart(['block' => true]); ?>
    $(document).ready(function() {
        $('#datetimepicker1').datetimepicker({
            "defaultDate":new Date()
        });
        
        //let now = moment();
        //console.log(now.format('DD/MM/YYYY HH:mm'));
        
        CKEDITOR.replace('texto');
        
        $('#bootstrapTagsInputForm')
        .find('[name="palabras_claves_"]')
            // Revalidate the cities field when it is changed
            .end();
    });
    
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
    document.getElementById('filename').addEventListener('change', archivo, false);
    document.getElementById('filename2').addEventListener('change', archivo2, false);
<?php $this->Html->scriptEnd(); ?>