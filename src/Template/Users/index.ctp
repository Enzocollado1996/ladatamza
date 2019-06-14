<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuarios 
            <a href="<?=$this->Url->build(['action' => 'add'], true)?>" class="btn btn-success pull-right"><span class="fa fa-plus"></span>&nbsp;Nuevo usuario</a>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.col-lg-12 -->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username', 'Usuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role', 'Rol') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', 'Creado') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= $user->created ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="fa fa-pencil"></span>', ['action' => 'edit', $user->id], ['escape' => false, 'title' => __('Editar'), 'class' => 'btn btn-primary btn-xs']) ?>
                    <?= $this->Html->link('<span class="fa fa-trash"></span>', ['action' => 'delete', $user->id], ['escape' => false, 'title' => __('Eliminar'), 'class' => 'btn btn-danger btn-xs']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->numbers(['first' => 'Primero']) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, viendo {{current}} resultado(s) de {{count}} totales')]) ?></p>
    </div>
</div>
