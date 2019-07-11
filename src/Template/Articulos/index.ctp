<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Articulo[]|\Cake\Collection\CollectionInterface $articulos
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Artículos 
            <a href="<?=$this->Url->build(['action' => 'add'], true)?>" class="btn btn-success pull-right"><span class="fa fa-plus"></span>&nbsp;Nuevo artículo</a>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.col-lg-12 -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <!--<th scope="col"><?= $this->Paginator->sort('visitas') ?></th>-->
                <th scope="col"><?= $this->Paginator->sort('habilitado', 'Visible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zona') ?></th>
                <th scope="col"><?= $this->Paginator->sort('palabras_claves') ?></th>
                <th scope="col"><?= $this->Paginator->sort('publicado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articulos as $articulo): ?>
            <tr>
                <td><?= $this->Number->format($articulo->id) ?></td>
                <td><?= h($articulo->titulo) ?></td>
                <td><?= h($articulo->publicado) ?></td>
                <!--<td><?= $this->Number->format($articulo->visitas) ?></td>-->
                <td><?= h($articulo->zona) ?></td>
                <td><?= h($articulo->palabras_claves) ?></td>
                <td><?= h($articulo->habilitado)  ? 'Si' : 'No' ?></td>
                <td><?= h($articulo->creado) ?></td>
                <td><?= h($articulo->modificado) ?></td>
                <td class="actions">
                    <!--<?= $this->Html->link('<span class="fa fa-eye"></span>', ['action' => 'view', $articulo->id], ['escape' => false, 'title' => __('Ver'), 'class' => 'btn btn-info btn-xs']) ?>-->
                    <?= $this->Html->link('<span class="fa fa-pencil"></span>', ['action' => 'edit', $articulo->id], ['escape' => false, 'title' => __('Editar'), 'class' => 'btn btn-primary btn-xs']) ?>
                    <?= $this->Html->link('<span class="fa fa-trash"></span>', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModal' . $articulo->id, 'escape' => false, 'title' => __('Eliminar'), 'class' => 'btn btn-danger btn-xs']) ?>
                    <div class="modal fade" id="basicModal<?= $articulo->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $articulo->id ?>?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <?= $this->Form->postLink('Borrar', ['action' => 'delete', $articulo->id], ['class' => 'btn btn-primary']) ?>
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
