<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Video[]|\Cake\Collection\CollectionInterface $videos
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Videos
            <a href="<?=$this->Url->build(['action' => 'add'], true)?>" class="btn btn-success pull-right"><span class="fa fa-plus"></span>&nbsp;Nuevo video</a>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo', 'Título') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publicado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videos as $video): ?>
            <tr>
                <td><?= $this->Number->format($video->id) ?></td>
                <td><?= h($video->titulo) ?></td>
                <td><?= h($video->nombre) ?></td>
                <td><?= h($video->tipo) ?></td>
                <td><?= h($video->publicado) ?></td>
                <td><?= h($video->creado) ?></td>
                <td><?= h($video->modificado) ?></td>
                <td class="actions">
                    <!--<?= $this->Html->link('<span class="fa fa-eye"></span>', ['action' => 'view', $video->id], ['escape' => false, 'title' => __('Ver'), 'class' => 'btn btn-info btn-xs']) ?>-->
                    <?= $this->Html->link('<span class="fa fa-pencil"></span>', ['action' => 'edit', $video->id], ['escape' => false, 'title' => __('Editar'), 'class' => 'btn btn-primary btn-xs']) ?>
                    <?= $this->Html->link('<span class="fa fa-trash"></span>', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModal' . $video->id, 'escape' => false, 'title' => __('Eliminar'), 'class' => 'btn btn-danger btn-xs']) ?>
                    <div class="modal fade" id="basicModal<?= $video->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $video->id ?>?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <?= $this->Form->postLink('Borrar', ['action' => 'delete', $video->id], ['class' => 'btn btn-primary']) ?>
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
