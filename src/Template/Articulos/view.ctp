<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Articulo $articulo
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Vista de artículo
            <?= $this->Html->link('<span class="fa fa-trash"></span>&nbsp;Eliminar', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModal' . $articulo->id, 'escape' => false, 'title' => 'Eliminar', 'class' => 'btn btn-danger pull-right']) ?>
            <a href="<?=$this->Url->build(['action' => 'edit', $articulo->id], true)?>" class="btn btn-info pull-right" style="margin-right:5px;"><span class="fa fa-pencil"></span>&nbsp;Editar</a>
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
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-6">    
        <div class="form-group">
            <?=$this->Form->control('titulo',['label' => 'Título', 'class'=>'form-control', 'value'=>$articulo->titulo, 'disabled']);?>
        </div>        
        <div class="form-group">
            <label>Descripción</label>
            <?=$this->Form->textarea('descripcion',['class'=>'form-control', 'value'=>$articulo->descripcion, 'disabled']);?>
        </div>
        <div class="form-group">
            <label>Texto</label>
            <?=$this->Form->textarea('texto',['class'=>'form-control', 'disabled']);?>
        </div>
        <div class="form-group">
            <div class="input text required">
                <label for="datetimepicker1">Fecha de publicación</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" name="datetimepicker1"/>
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
            <?=$this->Form->control('palabras_claves',['label' => 'Palabras claves', 'class'=>'form-control', 'value'=>$articulo->palabras_claves, 'disabled']);?>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <?=$this->Form->input('habilitado', ['label' => 'Nota visible','type' => 'checkbox']);?>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group" id ="imagen-articulo">
            <label>Imagen de artículo</label>
            <?php
            if($articulo->has('imagenes')){
                foreach($articulo->imagenes as $imagen){
                    echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $imagen->file_url.'/'.$imagen->filename, 
                        ['style'=> 'position: relative; width: 100%; margin: 10px 0;']);
                }
            }
            ?>
        </div>
    </div>
</div>
<?= $this->Html->script(['//cdn.ckeditor.com/4.11.4/standard/ckeditor.js']) ?>
<?php $this->Html->scriptStart(['block' => true]); ?>
    $(document).ready(function() {
        $('#datetimepicker1').datetimepicker();
        
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
                    $("#imagen-articulo").append('<img src="'+e.target.result+'" class="form-group"/>');
                    
                };
          })(f);

          reader.readAsDataURL(f);
        }        
    }
    
    document.getElementById('filename').addEventListener('change', archivo, false);
<?php $this->Html->scriptEnd(); ?>