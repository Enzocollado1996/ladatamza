<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Articulo $articulo
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Articulo'), ['action' => 'edit', $articulo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Articulo'), ['action' => 'delete', $articulo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articulo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articulos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articulo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articulos view large-9 medium-8 columns content">
    <h3><?= h($articulo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($articulo->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Palabras Claves') ?></th>
            <td><?= h($articulo->palabras_claves) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zona') ?></th>
            <td><?= h($articulo->zona) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($articulo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visitas') ?></th>
            <td><?= $this->Number->format($articulo->visitas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publicado') ?></th>
            <td><?= h($articulo->publicado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($articulo->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($articulo->modificado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Habilitado') ?></th>
            <td><?= $articulo->habilitado ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tiene Imagen') ?></th>
            <td><?= $articulo->tiene_imagen ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tiene Video') ?></th>
            <td><?= $articulo->tiene_video ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url') ?></h4>
        <?= $this->Text->autoParagraph(h($articulo->url)); ?>
    </div>
    <div class="row">
        <h4><?= __('Url Rss') ?></h4>
        <?= $this->Text->autoParagraph(h($articulo->url_rss)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($articulo->descripcion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Texto') ?></h4>
        <?= $this->Text->autoParagraph(h($articulo->texto)); ?>
    </div>
</div>
