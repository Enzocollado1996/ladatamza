<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video $video
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Editar video
            <?= $this->Html->link('<span class="fa fa-trash"></span>&nbsp;Eliminar', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModal' . $video->id, 'escape' => false, 'title' => 'Eliminar', 'class' => 'btn btn-danger pull-right']) ?>
            <a href="<?=$this->Url->build(['action' => 'index'], true)?>" class="btn btn-default pull-right" style="margin-right:5px;"><span class="fa fa-th-list"></span>&nbsp;Listado</a>            
            <div class="modal fade" id="basicModal<?= $video->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $video->id ?>?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <?= $this->Form->postLink('Borrar', ['action' => 'delete', $video->id], ['class' => 'btn btn-danger']) ?>
                        </div>
                    </div>
                </div>
            </div>
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
            <?php echo $this->Form->input('file', ['type' => 'file', 'label'=>'Archivo'/*, 'multiple'*/, 'accept'=>'.mp4, .flv']); ?>
            <div class="form-group" id="imagen-articulo"></div>
            <?php echo $this->Html->media(
                array(
                    'videos/'.$video->nombre,
                    array(
                        'src' => 'videos/'.$video->nombre,
                        'type' => "video/ogg; codecs='theora, vorbis'"
                    )
                ),
                array('autoplay',["controls","style='width:100%'"])
            ); ?>
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