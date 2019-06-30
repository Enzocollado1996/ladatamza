<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen $imagen
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Nueva im&aacute;gen
            <a href="<?=$this->Url->build(['action' => 'index'], true)?>" class="btn btn-default pull-right"><span class="fa fa-th-list"></span>&nbsp;Listado</a>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <?= $this->Form->create($imagen,['type' => 'file', 'class' => '', 'id'=>'bootstrapTagsInputForm', 'onkeypress'=>'return event.keyCode != 13;']) ?>
    <div class="col-lg-6">
        <div class="form-group">
            <?=$this->Form->input('descripcion',['label' => 'Descripción', 'class'=>'form-control']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->input('comentario',['class'=>'form-control']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->input('tipo',['type' => 'select','options' =>$tipos,'class'=>'form-control', 'required' => 'required']);?>
        </div>
        <?= $this->Form->button('Guardar',['class'=>'btn btn-success btn-block','type' => 'submit']) ?>
    </div>
    <div class="col-lg-6">
        <div class="form-group">            
            <?php echo $this->Form->input('filename[]', ['type' => 'file', 'label'=>'Imágen'/*, 'multiple'*/, 'accept'=>'.gif, .jpg, .jpeg, .png', 'required' => 'required']); ?>
            <div class="form-group" id="imagen-all"></div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
<?php $this->Html->scriptStart(['block' => true]); ?>    
    function archivo(evt) {
        $('#imagen-all').empty();
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
                    $("#imagen-all").append('<img src="'+e.target.result+'" class="form-group" style="width: 100%;"/>');                    
                };
          })(f);
          reader.readAsDataURL(f);
        }        
    }    
    document.getElementById('filename').addEventListener('change', archivo, false);
<?php $this->Html->scriptEnd(); ?>
