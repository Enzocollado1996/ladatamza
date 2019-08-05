<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicidad[]|\Cake\Collection\CollectionInterface $publicidades
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Publicidades tómbola
            <a href="<?=$this->Url->build(['action' => 'add'], true)?>" class="btn btn-success pull-right" style="margin-right:5px;"><span class="fa fa-plus"></span>&nbsp;Nueva publicidad</a>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activo', 'Visible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zona', 'Categoría') ?></th>
                <th scope="col"><?= $this->Paginator->sort('orden') ?></th>
                <th scope="col">Tiene imágen</th>
                <th scope="col">Creado</th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>                
<!--                <th scope="col"><?= $this->Paginator->sort('imagen_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('video_id') ?></th>-->
                <th scope="col" class="acciones"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($publicidades as $publicidad): ?>
            <tr>
                <td><?= $this->Number->format($publicidad->id) ?></td>
                <td><?= h($publicidad->nombre) ?></td>
                <td style="text-align: center;font-size: 15px;"><?= h($publicidad->habilitado)?'<span class="fa fa-check-circle" style="color:green;"></span>' : '<span class="fa fa-times" style="color:red;"></span>'?></td>
                <td><?= h($publicidad->zona) ?></td>
                <td><?= h($publicidad->orden) ?></td>
                <td style="text-align: center;font-size: 15px;"><?= $publicidad->has('imagen')?'<span class="fa fa-check-circle" style="color:green;"></span>' : '<span class="fa fa-times" style="color:red;"></span>'?></td>                
                <td><?= h($publicidad->creado) ?></td>
                <td><?= h($publicidad->modificado) ?></td>                
<!--                <td><?= $publicidad->has('imagen') ? $this->Html->link($publicidad->imagen->id, ['controller' => 'Imagenes', 'action' => 'view', $publicidad->imagen->id]) : '' ?></td>
                <td><?= $publicidad->has('video') ? $this->Html->link($publicidad->video->id, ['controller' => 'Videos', 'action' => 'view', $publicidad->video->id]) : '' ?></td>-->
                <td class="actions">
                    <!--<?= $this->Html->link('<span class="fa fa-eye"></span>', ['action' => ($publicidad->tipo == 'INICIAL' ? 'principal_edit': 'edit'), $publicidad->id], ['escape' => false, 'title' => __('Ver'), 'class' => 'btn btn-info btn-xs']) ?>-->
                    <?= $this->Html->link('<span class="fa fa-pencil"></span>', ['action' => ($publicidad->tipo == 'INICIAL' ? 'principal_edit': 'edit'), $publicidad->id], ['escape' => false, 'title' => __('Editar'), 'class' => 'btn btn-primary btn-xs']) ?>
                    <?= $this->Html->link('<span class="fa fa-trash"></span>', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModal' . $publicidad->id, 'escape' => false, 'title' => __('Eliminar'), 'class' => 'btn btn-danger btn-xs']) ?>
                    <div class="modal fade" id="basicModal<?= $publicidad->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $publicidad->id ?>?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <?= $this->Form->postLink('Borrar', ['action' => 'delete', $publicidad->id], ['class' => 'btn btn-primary']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <!--<?= $this->Paginator->numbers(['first' => 'Primero']) ?>-->
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <!--<?= $this->Paginator->numbers() ?>-->
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <!--<?= $this->Paginator->last(__('último') . ' >>') ?>-->
        </ul>
        <!--<p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, viendo {{current}} resultado(s) de {{count}} totales')]) ?></p>-->
    </div>
</div>
