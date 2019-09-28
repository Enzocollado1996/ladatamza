<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen[]|\Cake\Collection\CollectionInterface $imagenes
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Im&aacute;genes
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?= $this->Form->create($imagen,['type' => 'file', 'class' => '', 'id'=>'bootstrapTagsInputForm', 'onkeypress'=>'return event.keyCode != 13;']) ?>
<div class="table-responsive">
    <div class="col-lg-6">
        <div class="form-group">           
            <?= $this->Form->button('Guardar',['class'=>'btn btn-success btn-block','type' => 'submit']) ?> 
            <?php echo $this->Form->input('filename[]', ['type' => 'file', 'label'=>'Imágen gif', 'accept'=>'.gif, .jpg, .jpeg, .png']); ?>
            <div class="form-group" id="imagen-articulo"></div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
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
    document.getElementById('filename').addEventListener('change', archivo, false);
</script>