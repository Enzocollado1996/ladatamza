<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen[]|\Cake\Collection\CollectionInterface $imagenes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Imagen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="imagenes index large-9 medium-8 columns content">
    <h3><?= __('Imagenes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filename') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imagenes as $imagen): ?>
            <tr>
                <td><?= $this->Number->format($imagen->id) ?></td>
                <td><?= h($imagen->filename) ?></td>
                <td><?= h($imagen->creado) ?></td>
                <td><?= h($imagen->modificado) ?></td>
                <td><?= h($imagen->file_url) ?></td>
                <td><?= h($imagen->tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $imagen->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $imagen->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $imagen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
