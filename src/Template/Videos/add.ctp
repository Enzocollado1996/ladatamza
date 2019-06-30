<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Nuevo video
            <a href="<?=$this->Url->build(['action' => 'index'], true)?>" class="btn btn-default pull-right"><span class="fa fa-th-list"></span>&nbsp;Listado</a>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <?= $this->Form->create($video,['type' => 'file', 'class' => '', 'id'=>'bootstrapTagsInputForm', 'onkeypress'=>'return event.keyCode != 13;']) ?>
    <div class="col-lg-6">
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
            <?=$this->Form->input('titulo',['label' => 'Título', 'class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->input('comentario',['label' => 'Comentario', 'class'=>'form-control']);?>
        </div>
        <?= $this->Form->button('Guardar',['class'=>'btn btn-success btn-block','type' => 'submit']) ?>
    </div>
    <div class="col-lg-6">
        <div class="form-group">            
            <?php echo $this->Form->input('file', ['type' => 'file', 'label'=>'Archivo'/*, 'multiple'*/, 'accept'=>'.mp4, .flv', 'required' => 'required']); ?>
            <div class="form-group" id="imagen-articulo"></div>            
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
<?php $this->Html->scriptStart(['block' => true]); ?>
    $(document).ready(function() {
        $('#datetimepicker1').datetimepicker({
            "defaultDate":new Date()
        });
    });
<?php $this->Html->scriptEnd(); ?>