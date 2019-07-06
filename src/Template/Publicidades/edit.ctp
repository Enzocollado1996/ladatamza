<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicidad $publicidad
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Editar publicidad secundaria
            <?= $this->Html->link('<span class="fa fa-trash"></span>&nbsp;Eliminar', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModal' . $publicidad->id, 'escape' => false, 'title' => 'Eliminar', 'class' => 'btn btn-danger pull-right']) ?>
            <a href="<?=$this->Url->build(['action' => 'index'], true)?>" class="btn btn-default pull-right" style="margin-right:5px;"><span class="fa fa-th-list"></span>&nbsp;Listado</a>            
            <div class="modal fade" id="basicModal<?= $publicidad->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $publicidad->id ?>?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <?= $this->Form->postLink('Borrar', ['action' => 'delete', $publicidad->id], ['class' => 'btn btn-danger']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <?= $this->Form->create($publicidad,['type' => 'file', 'class' => '', 'id'=>'bootstrapTagsInputForm', 'onkeypress'=>'return event.keyCode != 13;']) ?>
    <div class="col-lg-6">
        <div class="form-group">
            <?=$this->Form->control('nombre',['class'=>'form-control', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->control('ir_a_url',['type'=> 'text','label' => 'Ir a url','class'=>'form-control']);?>
        </div>
        <div class="form-group">
            <?=$this->Form->control('orden',['type'=> 'number','label' => 'Posición entre notas','class'=>'form-control', 'placeholder' => '5', 'required' => 'required']);?>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <?=$this->Form->input('habilitado', ['label' => 'Habilitada','type' => 'checkbox']);?>
                </label>
            </div>
        </div>
        <?= $this->Form->button('Guardar',['class'=>'btn btn-success btn-block','type' => 'submit']) ?>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                Imágen
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <?=$this->Form->control('url_img_externa',['label' => 'Url imágen externa','type'=> 'text','class'=>'form-control']);?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('filename', ['type' => 'file', 'label'=>'Imágen'/*, 'multiple'*/, 'accept'=>'.gif, .jpg, .jpeg, .png']); ?>
                    <div class="form-group" id ="imagen-publicidad">
                        <?php
                        if($publicidad->has('imagen')){
                            echo $this->Html->image(Cake\Core\Configure::read('path_imagen_subida') . $publicidad->imagen->file_url.'/'.$publicidad->imagen->filename, 
                                ['style'=> 'position: relative; width: 100%; margin: 10px 0;']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>