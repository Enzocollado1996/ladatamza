<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen $imagen
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Imagen'), ['action' => 'edit', $imagen->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Imagen'), ['action' => 'delete', $imagen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Imagenes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Imagen'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="imagenes view large-9 medium-8 columns content">
    <h3><?= h($imagen->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Filename') ?></th>
            <td><?= h($imagen->filename) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File Url') ?></th>
            <td><?= h($imagen->file_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($imagen->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($imagen->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($imagen->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($imagen->modificado) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($imagen->descripcion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Comentario') ?></h4>
        <?= $this->Text->autoParagraph(h($imagen->comentario)); ?>
    </div>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($imagen->url)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Articulos') ?></h4>
        <?php if (!empty($imagen->articulos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Titulo') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Texto') ?></th>
                <th scope="col"><?= __('Palabras Claves') ?></th>
                <th scope="col"><?= __('Publicado') ?></th>
                <th scope="col"><?= __('Habilitado') ?></th>
                <th scope="col"><?= __('Creado') ?></th>
                <th scope="col"><?= __('Modificado') ?></th>
                <th scope="col"><?= __('Tiene Imagen') ?></th>
                <th scope="col"><?= __('Tiene Video') ?></th>
                <th scope="col"><?= __('Visitas') ?></th>
                <th scope="col"><?= __('Zona') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($imagen->articulos as $articulos): ?>
            <tr>
                <td><?= h($articulos->id) ?></td>
                <td><?= h($articulos->titulo) ?></td>
                <td><?= h($articulos->descripcion) ?></td>
                <td><?= h($articulos->texto) ?></td>
                <td><?= h($articulos->palabras_claves) ?></td>
                <td><?= h($articulos->publicado) ?></td>
                <td><?= h($articulos->habilitado) ?></td>
                <td><?= h($articulos->creado) ?></td>
                <td><?= h($articulos->modificado) ?></td>
                <td><?= h($articulos->tiene_imagen) ?></td>
                <td><?= h($articulos->tiene_video) ?></td>
                <td><?= h($articulos->visitas) ?></td>
                <td><?= h($articulos->zona) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articulos', 'action' => 'view', $articulos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articulos', 'action' => 'edit', $articulos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articulos', 'action' => 'delete', $articulos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
