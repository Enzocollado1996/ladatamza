<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicidad $publicidad
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Publicidad'), ['action' => 'edit', $publicidad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Publicidad'), ['action' => 'delete', $publicidad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publicidad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Publicidades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publicidad'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Imagenes'), ['controller' => 'Imagenes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Imagen'), ['controller' => 'Imagenes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Videos'), ['controller' => 'Videos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Video'), ['controller' => 'Videos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="publicidades view large-9 medium-8 columns content">
    <h3><?= h($publicidad->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($publicidad->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($publicidad->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Imagen') ?></th>
            <td><?= $publicidad->has('imagen') ? $this->Html->link($publicidad->imagen->id, ['controller' => 'Imagenes', 'action' => 'view', $publicidad->imagen->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Video') ?></th>
            <td><?= $publicidad->has('video') ? $this->Html->link($publicidad->video->id, ['controller' => 'Videos', 'action' => 'view', $publicidad->video->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($publicidad->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($publicidad->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($publicidad->modificado) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url Video Externo') ?></h4>
        <?= $this->Text->autoParagraph(h($publicidad->url_video_externo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Url Img Externa') ?></h4>
        <?= $this->Text->autoParagraph(h($publicidad->url_img_externa)); ?>
    </div>
</div>
