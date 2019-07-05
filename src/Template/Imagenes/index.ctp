<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen[]|\Cake\Collection\CollectionInterface $imagenes
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Im&aacute;genes
            <!--<a href="<?=$this->Url->build(['action' => 'add'], true)?>" class="btn btn-success pull-right"><span class="fa fa-plus"></span>&nbsp;Nueva im&aacute;gen</a>-->
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_url','Carpeta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filename', 'Nombre archivo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imagenes as $imagen): ?>
            <tr>
                <td><?= $this->Number->format($imagen->id) ?></td>
                <td><?= h($imagen->file_url) ?></td>
                <td><?= h($imagen->filename) ?></td>
                <td><?= h($imagen->tipo) ?></td>
                <td><?= h($imagen->creado) ?></td>
                <td><?= h($imagen->modificado) ?></td>
                <td class="actions">
                    <!--<?= $this->Html->link('<span class="fa fa-eye"></span>', ['action' => 'view', $imagen->id], ['escape' => false, 'title' => __('Ver'), 'class' => 'btn btn-info btn-xs']) ?>-->
                    <?= $this->Html->link('<span class="fa fa-pencil"></span>', ['action' => 'edit', $imagen->id], ['escape' => false, 'title' => __('Editar'), 'class' => 'btn btn-primary btn-xs']) ?>
                    <?= $this->Html->link('<span class="fa fa-trash"></span>', 
                        ['action' => '#'], 
                        ['data-toggle' => 'modal', 'data-target' => '#basicModal' . $imagen->id, 'escape' => false, 'title' => __('Eliminar'), 'class' => 'btn btn-danger btn-xs']) ?>
                    <div class="modal fade" id="basicModal<?= $imagen->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Está seguro de borrar el registro #<?= $imagen->id ?>?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <?= $this->Form->postLink('Borrar', ['action' => 'delete', $imagen->id], ['class' => 'btn btn-primary']) ?>
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
