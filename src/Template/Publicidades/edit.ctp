<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Publicidad $publicidad
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $publicidad->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $publicidad->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Publicidades'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Imagenes'), ['controller' => 'Imagenes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Imagen'), ['controller' => 'Imagenes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Videos'), ['controller' => 'Videos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Video'), ['controller' => 'Videos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="publicidades form large-9 medium-8 columns content">
    <?= $this->Form->create($publicidad) ?>
    <fieldset>
        <legend><?= __('Edit Publicidad') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('tipo');
            echo $this->Form->control('url_video_externo');
            echo $this->Form->control('url_img_externa');
            echo $this->Form->control('creado', ['empty' => true]);
            echo $this->Form->control('modificado', ['empty' => true]);
            echo $this->Form->control('imagen_id', ['options' => $imagenes, 'empty' => true]);
            echo $this->Form->control('video_id', ['options' => $videos, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
