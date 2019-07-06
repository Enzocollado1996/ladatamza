<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicidad $publicidad
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Nueva publicidad secundaria
            <a href="<?=$this->Url->build(['action' => 'index'], true)?>" class="btn btn-default pull-right"><span class="fa fa-th-list"></span>&nbsp;Listado</a>
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
                    <div class="form-group" id="imagen-articulo"></div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>