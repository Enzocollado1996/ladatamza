<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Imagen $imagen
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $imagen->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $imagen->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Imagenes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Articulos'), ['controller' => 'Articulos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Articulo'), ['controller' => 'Articulos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="imagenes form large-9 medium-8 columns content">
    <?= $this->Form->create($imagen) ?>
    <fieldset>
        <legend><?= __('Edit Imagen') ?></legend>
        <?php
            echo $this->Form->control('filename');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('comentario');
            echo $this->Form->control('url');
            echo $this->Form->control('creado');
            echo $this->Form->control('modificado', ['empty' => true]);
            echo $this->Form->control('file_url');
            echo $this->Form->control('tipo');
            echo $this->Form->control('articulos._ids', ['options' => $articulos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
